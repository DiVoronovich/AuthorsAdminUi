<?php
declare(strict_types=1);

namespace ScienceSoft\Router\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
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
     * @var ResponseInterface
     */
    private ResponseInterface $response;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param ResponseInterface $response
     */
    public function __construct(
        ActionFactory     $actionFactory,
        ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->response = $response;
    }

    /**
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'authors_list') !== false) {
            $request->setModuleName('author');
            $request->setControllerName('index');
            $request->setActionName('index');
            $request->setParams([]);

            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        } elseif (strpos($identifier, 'author_page') !== false) {
            $routes = explode('/', $identifier);
            $identity = $routes[1];
            $request->setModuleName('author');
            $request->setControllerName('index');
            $request->setActionName('view');
            $request->setParams([
                'identity' => $identity,
            ]);

            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        }

        return null;
    }
}
