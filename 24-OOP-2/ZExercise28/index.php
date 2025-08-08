<?php

interface SocialMediaPublisher {
	public function publish(string $content, string $token);
	public function publishPost(string $publisher, string $content, string $token);
}

class FacebookPublisher implements SocialMediaPublisher
{
	public function publish(string $content, string $token): bool
	{
		// Simulate token verification
		if ($token !== "valid_facebook_token") {
			echo "Failed to publish to Facebook: Invalid Token\n";
			return false;
		}
		// Only attempt publishing after verifying the token
		echo "Publishing to Facebook: $content\n";
		return true;
	}
	public function publishPost(string $publisher, string $content, string $token): bool {
		if ($this->publish($content, $token)) {
			echo "Post published successfully.\n";
			return true;
		} else {
			echo "Failed to publish post.\n";
			return false;
		}
	}

}

class LinkedInPublisher implements SocialMediaPublisher
{
	public function publish(string $content, string $token): bool
	{
		// Simulate token verification first
		if ($token !== "valid_linkedin_token") {
			echo "Failed to publish to LinkedIn: Invalid Token\n";
			return false;
		}
		// Only attempt publishing after verifying the token
		echo "Publishing to LinkedIn: $content\n";
		return true;
	}
	public function publishPost(string $publisher, string $content, string $token): bool {
		if ($this->publish($content, $token)) {
			echo "Post published successfully.\n";
			return true;
		} else {
			echo "Failed to publish post.\n";
			return false;
		}
	}

}

$fb = new FacebookPublisher();
$fb->publishPost("My Publisher", "My Comment", "valid_facebook_token");



