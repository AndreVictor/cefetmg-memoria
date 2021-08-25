<?php
$args = [
	'status' => 'approve',
];

$comments_query = new WP_Comment_Query();
$comments = $comments_query->query($args);

echo comment_form();

if ($comments) {
	foreach ($comments as $comment) {
		echo '<p>' . $comment->comment_author . '</p>';
		echo '<p>' . $comment->comment_content . '</p>';
	}
} else {
	echo 'No comments found.';
}
