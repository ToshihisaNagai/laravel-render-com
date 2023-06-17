<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>新規投稿</title>
     <link rel="stylesheet" href="{{ asset('/css/app.css') }}">    
 </head>
 
 <body>
     <header>
         <nav>
             <div>                
                 <a href="{{ route('sujis.index') }}">臨時列車スジアプリ</a>          
             </div>
         </nav>
     </header>
 
     <main>
         <article>
             <div>                
                 <h1>臨時列車スジ新規投稿</h1>   
                 
                 <div>
                     <a href="{{ route('sujis.index') }}">&lt; 戻る</a>                                  
                 </div>
 
                 <form action="{{ route('sujis.store') }}" method="post">
                     @csrf
                     <div>
                         <label for="title">タイトル</label>
                         <input type="text" name="title" value="{{ old('title') }}">
                     </div>
                     <div>
                        <label for="date">運転日（出発駅基準）</label>
                        <input type="date" name="date" value="{{ old('date') }}">
                     </div>
                     <div>
                         <label for="train_suji">スジ（列車番号/列車名/駅名/出発時刻/到着時刻/通過時刻/番線等）</label>
                         <br>
                         <textarea name="train_suji">{{ old('train_suji') }}</textarea>
                     </div>
                     <div>
                        <label for="train_type">列車の形式</label>
                        <input type="text" name="train_type" value="{{ old('train_type') }}">
                     </div>
                     <div>
                        <label for="quantity_of_vehicles">列車の両数</label>
                        <input type="text" name="quantity_of_vehicles" value="{{ old('quantity_of_vehicles') }}">
                     </div>
                     <div>
                        <label for="note">注釈</label>
                        <br>
                        <textarea name="note">{{ old('note') }}</textarea>
                     </div>
                     <button>投稿</button>
                 </form>
             </div>
         </article>

         <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
     </main>
 
     <footer>        
         <p>&copy; 臨時列車スジアプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>
