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
	private array 	$instances	= [];
	private array 	$ctorRecipes		= [];
	public function __construct()
	{
		$this->ctorRecipes['postsRepository'] = function() {
			return new PostsRepository('A', 'B');
		};
		$this->ctorRecipes['postsController'] = function() {
			$postsRepository = $this->get('postsRepository');
			return new PostsController($postsRepository);
		};
	}

	public function get(string $component)
	{
		if (empty($this->instances[$component])) {
			if (empty($this->ctorRecipes[$component])) {
				echo "Component '$component' not found";
				die();
			}
			$this->instances[$component] = $this->ctorRecipes[$component]();
		}
		return $this->instances[$component];
	}

}

$container = new Container();
$postsRepository = $container->get('postsRepository');
var_dump($postsRepository);
$postsController = $container->get('postsController');
var_dump($postsController);
$postsController = $container->get('postsControllerxxx');

