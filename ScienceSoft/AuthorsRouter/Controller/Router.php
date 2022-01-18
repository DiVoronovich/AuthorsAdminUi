<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsRouter\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

/**
 * Class Router
 */
class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    private ActionFactory $actionFactory;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     */
    public function __construct(
        ActionFactory $actionFactory
    ) {
        $this->actionFactory = $actionFactory;
    }

    /**
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        if ($request->getModuleName() === 'author') {
            return null;
        }
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'author_page') !== false) {
            $routes = explode('/', $identifier);
            $identity = $routes[1];
            $request->setModuleName('author');
            $request->setControllerName('index');
            $request->setActionName('view');
            $request->setParams([
                'identity' => $identity,
            ]);

            return $this->actionFactory->create(Forward::class);
        }

        return null;
    }
}
