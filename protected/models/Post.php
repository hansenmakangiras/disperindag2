<?php

/**
* 
*/
class Post extends CActiveRecord
{
	// Custom method for adding the comment to current post
	function addComment(Comment $comment){
		$comment->post_id = $this->id;

		//creating event class instance
		$event = new NewCommentEvent($this);
		$event->post = $this;
		$event->comment = $comment;

		// Triggering Event
		$this->onNewComment($event);
		return $event->isValid;
	}

	// Defining onNewComment event
	public function onNewComment($event){
		$this->raiseEvent('onNewComment', $event);
	}
}