<?php

namespace Ubermanu\PhpElements\Tests\Unit;

use Ubermanu\PhpElements\Comment;

class CommentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testComment(): void
    {
        $comment = new Comment('Some comment');
        $this->assertEquals('<!-- Some comment -->', $comment->render());

        $comment = new Comment();
        $comment->setContent('Some comment through accessor');
        $this->assertEquals('<!-- Some comment through accessor -->', $comment->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testCommentToString(): void
    {
        $comment = new Comment('Some comment to string');
        $this->assertEquals('<!-- Some comment to string -->', (string)$comment);
    }

    /**
     * @covers
     * @return void
     */
    public function testEmptyComment(): void
    {
        $comment = new Comment();
        $this->assertEquals('', $comment->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testCommentEscapeTags(): void
    {
        $comment = new Comment('Some comment with <tag>');
        $this->assertEquals('<!-- Some comment with &lt;tag&gt; -->', $comment->render());
    }
}
