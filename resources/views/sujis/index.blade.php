<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿一覧</title>

     @vite(['resources/js/app.js'])
 </head>
 
 <body style="padding: 60px 0;">
     <header>
         <nav class="navbar navbar-light bg-light fixed-top" style="height: 60px;">
             <div class="container">
                 <a href="{{ route('sujis.index') }}" class="navbar-brand">臨時列車スジアプリ</a>            
             </div>
         </nav>
     </header>
     
     <main>
         <article>
             <div>                
                @if (session('flash_message'))
                     <p class="text-success">{{ session('flash_message') }}</p>
                @endif
                <div class="mb-2">
                    <a href="{{ route('sujis.create') }}" class="btn btn-primary left_spacing">新規投稿</a>                                   
                </div>    
             </div>
             <h1 class="left_spacing">投稿一覧</h1>

             @foreach ($sujis as $suji)
             <a class="left_spacing" href="{{ route('sujis.show',$suji) }}">{{ $suji->title }}</a>
                <div class="mb-3 left_spacing">
                    <!--<div class="card-body">-->
                        <!--<div class="col-12">-->
                            <!--<p class="suji-label mt-2">-->
                                <!--{{ $suji->title }}<br>-->
                            <!--</p>-->
                        <!--</div>-->
                    <!--</div>-->
                </div>
             @endforeach
        </article>

        <a href="#" class="btn btn-primary left_spacing" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
     </main>
 
     <footer class="d-flex justify-content-center align-items-center bg-light fixed-bottom" style="height: 60px;">        
         <p class="text-muted small mb-0">&copy; 臨時列車スジアプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>