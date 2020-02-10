<?php

class BlogController extends \BaseController {

	public function index()
	{
		$blogs = Blog::latest()->get();

		Return View::make('blogs.index',array('blogs' => $blogs));
	}

	public function create()
	{
		$tags = Tag::lists('name','id');
		Return View::make('blogs.create', array('disabled'=>'','tags'=>$tags));
	}

	public function store()
	{
		$validator = Validator::make(Input::all(),Blog::$addRules);

        if ($validator->passes()) {
            $blog = new Blog;
            $blog->user_id = Input::get('user_id');
			$blog->title = Input::get('title');
			$blog->slug = Input::get('slug');
			$blog->content = Input::get('content');
			$blog->save();

        	$blog->tags()->attach(Input::get('tag_list'));
          
            return Redirect::to('blogs')->with('message', 'Blog entry successfully posted!');
        } else {
            return Redirect::to('blogs/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
	}

	public function show($slug)
	{
		$blog = Blog::where('slug', '=', $slug)
				->orWhere('id', '=', $slug)	
				->firstOrFail();

		return View::make('blogs.show', array('blog'=>$blog));
	}

	public function edit($slug)
	{
		$blog = Blog::where('slug', '=', $slug)
				->orWhere('id', '=', $slug)	
				->firstOrFail();
		$tags = Tag::lists('name','id');				

		if(Auth::id() == $blog->user_id || Blog::IsAdminOrChiefEditor()) {
			return View::make('blogs.edit', array('disabled'=>'disabled','tags'=>$tags))->withBlog($blog);
		} else {
			return Redirect::to('blogs')->with('message','Only the owner can edit this blog.');
		}	
	}

	public function update($slug)
	{
		$validator = Validator::make(Input::all(),Blog::$editRules);

        if ($validator->passes()) {
            $blog = Blog::where('slug', '=', $slug)
					->orWhere('id', '=', $slug)	
					->firstOrFail();

			$blog->fill(Request::except('slug'))
					->save();
			
			$blog->tags()->sync(Input::get('tag_list'));

			return Redirect::to('blogs')
				->with('message', 'Updated!');
        } else {
			return Redirect::to('blogs/'.$slug.'/edit')
				->with('message', 'The following errors occurred')
				->withErrors($validator)->withInput();
        }
	}

	public function destroy($slug)
	{
		$blog = Blog::where('slug', '=', $slug)
					->orWhere('id', '=', $slug)	
					->firstOrFail();

		if(Auth::id() != $blog->user_id) 
			return Redirect::to('blogs/'.$blog->slug.'/edit')
			->with('message','Only the owner can delete this blog.');
		
		$blog->delete();

		return Redirect::to('blogs')->with('message','Successfully deleted');
	}

}
