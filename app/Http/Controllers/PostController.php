    public function show(Post $post): View
    {
        $post->load('user', 'category', 'tags');

        $related = $post->category
            ? $post->category->posts()
                ->published()
                ->where('id', '!=', $post->id)
                ->with('user', 'category', 'tags')
                ->latest('published_at')
                ->take(3)
                ->get()
            : collect();

        return view('posts.show', compact('post', 'related'));
    }