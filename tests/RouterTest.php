<?php

use Nette\Http\Request;
use Nette\Http\UrlScript;

/**
 * @author Michal Kvasničák <michal.kvasnicak@gmail.com>
 */
class RouterTest extends PHPUnit_Framework_TestCase
{

    public function testGetMethod()
    {
        $router = new \Telepat\Application\Routers\Router();

        $router->get('test', 'Homepage:index');

        $this->assertCount(1, $router);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'get');

        $this->assertTrue($router->match($request) !== null);
    }


    public function testPostMethod()
    {
        $router = new \Telepat\Application\Routers\Router();

        $router->post('test', 'Homepage:index');

        $this->assertCount(1, $router);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'post');

        $this->assertTrue($router->match($request) !== null);
    }


    public function testDeleteMethod()
    {
        $router = new \Telepat\Application\Routers\Router();

        $router->delete('test', 'Homepage:index');

        $this->assertCount(1, $router);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'delete');

        $this->assertTrue($router->match($request) !== null);
    }


    public function testPutMethod()
    {
        $router = new \Telepat\Application\Routers\Router();

        $router->put('test', 'Homepage:index');

        $this->assertCount(1, $router);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'put');

        $this->assertTrue($router->match($request) !== null);
    }


    public function testAnyMethod()
    {
        $router = new \Telepat\Application\Routers\Router();

        $router->any('test', 'Homepage:index');

        $this->assertCount(1, $router);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'get');

        $this->assertTrue($router->match($request) !== null);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'post');

        $this->assertTrue($router->match($request) !== null);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'put');

        $this->assertTrue($router->match($request) !== null);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'delete');

        $this->assertTrue($router->match($request) !== null);
    }


    public function testMatchMethod()
    {
        $router = new \Telepat\Application\Routers\Router();

        $router->matching('get|post', 'test', 'Homepage:index');

        $router->matching(['get', 'post'], 'test2', 'Homepage:index');

        $this->assertCount(2, $router);

        $url = new UrlScript('http://localhost/test');
        $request = new Request($url, null, null, null, null, null, 'get');

        $this->assertTrue($router->match($request) !== null);

        $url = new UrlScript('http://localhost/test2');
        $request = new Request($url, null, null, null, null, null, 'post');

        $this->assertTrue($router->match($request) !== null);
    }

}
