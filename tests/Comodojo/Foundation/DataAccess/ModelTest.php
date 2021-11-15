<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\DataAccess;

use \PHPUnit\Framework\TestCase;
use \UnexpectedValueException;
use \BadMethodCallException;

class ModelTest extends TestCase
{

    public $question = "Ultimate Question of Life, The Universe, and Everything";

    public $answer = 42;

    public $wrong_answer = 24;

    public function testPdModel()
    {

        $model = new MockPdModel();

        $this->assertEquals($this->question, $model->question);
        $this->assertEquals($this->answer, $model->answer);

        $model->answer = $this->wrong_answer;
        $this->assertEquals($this->wrong_answer, $model->answer);

        $model->merge(['answer' => $this->answer]);
        $this->assertEquals($this->answer, $model->answer);

        $this->assertTrue(isset($model->question));
        $this->assertFalse(isset($model->marvin));
        $this->assertNull($model->marvin);

        $model->import(['answer' => $this->wrong_answer, "question" => $this->question]);
        $this->assertEquals($this->wrong_answer, $model->answer);
    }

    public function testPdModelAddException()
    {

        $this->expectException(UnexpectedValueException::class);

        $model = new MockPdModel();
        $model->marvin = "Sad Robot";
    }

    public function testPdModelSetRaw()
    {

        $model = new MockPdModel();
        $marvin = "Sad Robot";

        $model->mockSetRaw('marvin', $marvin);

        $this->assertTrue(isset($model->marvin));
        $this->assertEquals($marvin, $model->marvin);
    }

    public function testPdModelUnsetException()
    {

        $this->expectException(BadMethodCallException::class);

        $model = new MockPdModel();
        unset($model->answer);
    }

    public function testPdModelMergeException()
    {

        $this->expectException(UnexpectedValueException::class);

        $model = new MockPdModel();
        $model->merge(['marvin' => "Sad Robot"]);
    }

    public function testPdModelImportException()
    {

        $this->expectException(UnexpectedValueException::class);

        $model = new MockPdModel();
        $model->merge(['answer' => $this->wrong_answer, "question" => $this->question, 'marvin' => "Sad Robot"]);
    }

    public function testRoModel()
    {

        $model = new MockRoModel();

        $this->assertEquals($this->question, $model->question);
        $this->assertEquals($this->answer, $model->answer);
    }

    public function testRoModelSetException()
    {

        $this->expectException(BadMethodCallException::class);

        $model = new MockRoModel();
        $model->answer = $this->wrong_answer;
    }

    public function testRoModelUnsetException()
    {

        $this->expectException(BadMethodCallException::class);

        $model = new MockRoModel();
        unset($model->answer);
    }

    public function testRoModelSetRaw()
    {

        $model = new MockRoModel();
        $marvin = "Sad Robot";

        $model->mockSetRaw('marvin', $marvin);

        $this->assertTrue(isset($model->marvin));
        $this->assertEquals($marvin, $model->marvin);
    }

    public function testRwModel()
    {

        $model = new MockRwModel();

        $this->assertTrue(isset($model->question));

        $model->question = $this->question;
        $model->answer = $this->answer;
        $model->wrong = $this->wrong_answer;

        $this->assertEquals($this->question, $model->question);
        $this->assertEquals($this->answer, $model->answer);
        $this->assertEquals($this->wrong_answer, $model->wrong);

        unset($model->question);
        $this->assertFalse(isset($model->question));
    }
}
