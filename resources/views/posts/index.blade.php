<x-layout>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    From the Firehose
                </h3>

                @foreach ($posts as $post)
                    <div class="blog-post">

                        <a href="/posts/{{ $post->id }}">

                            <h2 class="blog-post-title"><?= $post->title ?></h2>

                        </a>
                        <p class="blog-post-meta">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} بقلم <a
                                href="#">{{ $post->author }}</a>
                        </p>
                    </div>
                @endforeach

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1"
                        aria-disabled="true">Newer</a>
                </nav>

            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4>مبادئ التسويق الإلكتروني</h4>
                    <p>يمكنك الآن شراء نسختك من كتاب مبادئ التسويق الإلكتروني بتخفيض قدره 30%. أدخل عنوان بريدك
                        الإلكتروني لتصلك رسالة بالتفاصيل.</p>
                    <form action="/mail" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" id="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">إرسال</button>
                        </div>
                    </form>
                    @error('email')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->
</x-layout>
