<?php
header('Content-Type: text/plain');

class PostsRepository
{
	public function __construct(private string $a, private string $b)
	{
	}
}
class PostsController
{
	public function __construct(private PostsRepository $postsRepository)
	{
	}
}

class Container
{
	private array	$instances		= [];
	public array 	$recipes	= [];
	public function __construct()
	{
	}

	public function get(string $component)
	{
		if (empty($this->instances[$component])) {
			if (empty($this->recipes[$component])) {
				echo "Component '$component' not found";
				die();
			}
			$this->instances[$component] = $this->recipes[$component]();
		}
		return $this->instances[$component];
	}

}

$container = new Container();

$container->recipes['postsRepository'] = function() {
	return new PostsRepository('A', 'B');
};
$container->recipes['postsController'] = function() use ($container) {
	$postsRepository = $container->get('postsRepository');
	return new PostsController($postsRepository);
};

$postsRepository = $container->get('postsRepository');
var_dump($postsRepository);
$postsController = $container->get('postsController');
var_dump($postsController);
$postsController = $container->get('postsControllerxxx');

