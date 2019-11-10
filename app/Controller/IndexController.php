<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Exception\FooException;
use App\Exception\TestException;

class IndexController extends Controller
{
    public function index()
    {
        try {
            $a = [];
            var_dump($a[1]);
        } catch (\Throwable $throwable) {
            var_dump(get_class($throwable), $throwable->getMessage());
        }

        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        if ($user == 'test') {
            throw new TestException('test');
        }

        if ($user == 'foo') {
            throw new FooException('foo');
        }

        return $this->response->success([
            'user' => $user,
            'method' => $method,
            'message' => 'Hello Hyperf.',
        ]);
    }
}
