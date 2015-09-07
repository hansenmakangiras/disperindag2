<?php

class PostController extends Controller
{
	function actionAddComment(){
		$post = Post::model()->findByPk(10);
		$notifier = new Notifier();

		// Attaching Event Handler
		$post->onNewComment = array($notifier, 'comment');

		// In the real application data should come from $_POST
		$comment = new Comment;
		$comment->author = 'Hansen Makangiras';
		$comment->text = 'Test Komentar';

		// Adding Comment
		$post->addComment($comment);
	}
}
