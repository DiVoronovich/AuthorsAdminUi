<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsRouter\Test\Unit\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ScienceSoft\AuthorsRouter\Controller\Router;

class RouterTest extends TestCase
{
    /**
     * @var MockObject|RequestInterface
     */
    private $requestMock;

    /**
     * @var MockObject|ActionFactory
     */
    private $actionFactoryMock;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var ActionInterface|MockObject
     */
    private $actionMock;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->requestMock = $this->getMockBuilder(RequestInterface::class)
            ->setMethods(
                [
                    'getModuleName',
                    'getPathInfo',
                    'setModuleName',
                    'setControllerName',
                    'setActionName',
                    'setParams'
                ]
            )
            ->getMockForAbstractClass();

        $this->actionFactoryMock = $this->getMockBuilder(ActionFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->actionMock = $this->getMockBuilder(ActionInterface::class)
            ->getMock();

        $objectManagerHelper = new ObjectManager($this);
        $this->router = $objectManagerHelper->getObject(
            Router::class,
            [
                'actionFactory' => $this->actionFactoryMock
            ]
        );
    }

    public function testExecuteMethod()
    {
        $this->requestMock->expects($this->once())
            ->method('getModuleName')
            ->willReturn('author_page');
        $this->requestMock->expects($this->once())
            ->method('getModuleName')
            ->willReturn('author');
        $this->requestMock->expects($this->once())
            ->method('getModuleName')
            ->willReturn('acv');

        $this->requestMock->expects($this->once())
            ->method('getPathInfo')
            ->willReturn('/author_page/something');

        $this->requestMock->expects($this->once())
            ->method('setModuleName')
            ->with('author')
            ->willReturnSelf();

        $this->requestMock->expects($this->once())
            ->method('setControllerName')
            ->with('index')
            ->willReturnSelf();

        $this->requestMock->expects($this->once())
            ->method('setActionName')
            ->with('view')
            ->willReturnSelf();

        $this->requestMock->expects($this->once())
            ->method('setParams')
            ->with(['identity' => 'something'])
            ->willReturnSelf();

        $this->actionFactoryMock->expects($this->once())
            ->method('create')
            ->with(Forward::class)
            ->willReturn($this->actionMock);

        $this->assertEquals($this->actionMock, $this->router->match($this->requestMock));
    }

    public function testImplementsRouterInterface()
    {
        $this->assertInstanceOf(Router::class, $this->router);
    }
}
