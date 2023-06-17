<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>新規投稿</title>
     <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
     <!--jQuery JS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" /></script>
     <!--jQuery UI JS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <!--jQuery UI CSS-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
     <!--<script defer src="app.js"></script>-->
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
             <div class="container">                
                 <h1 class="fs-2 my-3">臨時列車スジ新規投稿</h1>
                 
                 @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                 
                 <div class="mb-2">
                     <a href="{{ route('sujis.index') }}" class="btn btn-primary">&lt; 戻る</a>                      
                 </div>
 
                 <form action="{{ route('sujis.store') }}" method="post">
                     @csrf
                     <div class="form-group mb-3">
                         <label for="title">タイトル</label>
                         <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                     </div>

                     <!--<div class="form-group mb-3">
                        <label for="date">運転日（出発駅基準）</label>
                        <input type="date" name="date" value="{{ old('date') }}">
                     </div>-->

                     <div class="d-flex flex-wrap">
                                                
                            <label for="date">運転日（出発駅基準）
                                <div class="d-flex align-items-center mt-3 me-3 date">
                                    <!--<input type="date" value="{{ old('date') }}" name="date[]">-->
                                    <label>日付</label>
                                    <button id="addBtn" type="button">増やす</button>
                                    <button id="removeBtn" type="button">減らす</button>
                                    <!--<button id="removeBtn" type="button">減らす</button>-->
                                    <!-- <button id="sendBtn">送信</button>-->
                                    <div id="parent">
                                        @for($i = 0; $i == 0 || old("date.{$i}"); $i++)
                                            <input type="date" name="date[]" class="dates" value="{{ old("date.{$i}") }}">
                                        @endfor
                                    </div>
                                </div>                                                   
                            </label>                                                       
                        
                     </div>

                     <div class="form-group mb-3">
                         <label for="train_suji">スジ（列車番号/列車名/駅名/出発時刻/到着時刻/通過時刻/番線等）</label>
                         <br>
                         <textarea class="form-control" name="train_suji">{{ old('train_suji') }}</textarea>
                     </div>
                     <div class="form-group mb-3">
                        <label for="train_type">列車の形式</label>
                        <input type="text" name="train_type" value="{{ old('train_type') }}">
                     </div>
                     <div class="form-group mb-3">
                        <label for="quantity_of_vehicles">列車の両数</label>
                        <input type="text" name="quantity_of_vehicles" value="{{ old('quantity_of_vehicles') }}">
                     </div>
                     <div class="form-group mb-3">
                        <label for="note">注釈</label>
                        <br>
                        <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                     </div>
                     <button type="submit" class="btn btn-outline-primary">投稿</button>
                 </form>
             </div>
             
             <br>
             <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
         </article>
     </main>
 
     <footer class="d-flex justify-content-center align-items-center bg-light fixed-bottom" style="height: 60px;">
         <p class="text-muted small mb-0">&copy; 臨時列車スジアプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>