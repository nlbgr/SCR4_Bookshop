<?php

final class ServiceProvider
{
    private $serviceDescriptors = [];
    private $instances = [];

    private const SERVICE_TYPE = 'type';
    private const SERVICE_FACTORY = 'factory';
    private const SERVICE_IS_SINGLETON = 'singleton';

    public function register(string $serviceType, string|callable|null $implementation = null, bool $isSingleton = false): void
    {
        $factory = match (true) {
            // implementation is string (name of other service) --> create this service by resolving this other service
            is_string($implementation) => function () use ($implementation) {
                return $this->resolve($implementation);
            },
            // implementation is callable (factory function) --> create this service by calling this factory function
            is_callable($implementation) => $implementation,
            // no implementation provided --> create this service by instanticating class with service name
            default => function () use ($serviceType) {
                return $this->createInstance($serviceType);
            },
        };
        $this->serviceDescriptors[$serviceType] = [
            self::SERVICE_TYPE => $serviceType,
            self::SERVICE_FACTORY => $factory,
            self::SERVICE_IS_SINGLETON => $isSingleton,
        ];
    }

    public function resolve(string $serviceType): object
    {
        // look up service descriptor
        $sd = $this->serviceDescriptors[$serviceType] ?? null;
        if ($sd === null) {
            throw new \Exception("Service '{$serviceType}' not registered for dependency injection.");
        }
        // check for existing instance
        $instance = $this->instances[$sd[self::SERVICE_TYPE]] ?? null;
        if ($instance === null) {
            // create instance via factory
            $instance = $sd[self::SERVICE_FACTORY]();
            // store instance when service is singleton
            if ($sd[self::SERVICE_IS_SINGLETON]) {
                $this->instances[$sd[self::SERVICE_TYPE]] = $instance;
            }
        }
        return $instance;
    }

    private function createInstance(string $className): object
    {
        $params = [];
        $ctor = (new \ReflectionClass($className))->getConstructor();
        if ($ctor !== null) {
            foreach ($ctor->getParameters() as $param) {
                $pt = $param->getType();
                if (!$pt instanceof \ReflectionNamedType) {
                    throw new \Exception("Cannot resolve constructor parameter '{$param->getName()}' for class '$className': Parameter does not have named type.");
                }
                $params[] = $this->resolve($pt->getName());
            }
        }
        return new $className(...$params);
    }
}
