<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta name="description" content="臨時列車スジの詳細です。"> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>臨時列車スジ詳細</title>

    @vite(['resources/js/app.js'])
  </head>

  <body style="padding: 60px 0;">

    <header>

      <div class="container">

        <h1 class="fs-2 my-3">臨時列車スジ詳細</h1>

        @if (session('flash_message'))
          <p class="text-success">{{ session('flash_message') }}</p>
        @endif

        <div class="mb-2">
          <a href="{{ route('sujis.index') }}" class="text-decoration-none">&lt; 戻る</a>                              
        </div>

      </div>

    </header>
    
    <main>

      <article>
        <div class="container">
          
          <div>
            <p class="fs-3 my-3">{{ $suji->title }}</p>
          </div>

          <div>
            <p class="fs-3 my-3">運転日（出発駅基準）</p>
            <p class="fs-3 my-3">
            @foreach ($suji_dates as $suji_date)                                   
                <span class="badge bg-secondary mt-2 me-2 fw-light">{{ $suji_date->date}}</span>                                      
            @endforeach
            
          </div>

          <div>
            <p class="fs-3 my-3">スジ（列車番号/列車名/駅名/出発時刻/到着時刻/通過時刻/番線等）</p>
            <p class="fs-3 my-3">{{ $suji->train_suji }}</p>
          </div>

          <div>
            <p class="fs-3 my-3">列車の形式</p>
            <p class="fs-3 my-3">{{ $suji->train_type }}</p>
          </div>

          <div>
            <p class="fs-3 my-3">列車の両数</p>
            <p class="fs-3 my-3">{{ $suji->quantity_of_vehicles }}</p>
          </div>

          <div>
            <p class="fs-3 my-3">注釈</p>
            <p class="fs-3 my-3">{{ $suji->note }}</p>
          </div>

          <div>
            <p class="fs-4 my-3">投稿日時</p>
            <p class="fs-4 my-3">{{ $suji->created_at }}</p>
          </div>

          <div>
            <p class="fs-4 my-3">最終更新日時</p>
            <p class="fs-4 my-3">{{ $suji->updated_at }}</p>
          </div>

          <div>                            
            <a class="btn btn-primary left_spacing" href="{{ route('sujis.edit', $suji) }}">編集</a>
          </div>
          <br>

          <form onclick="return confirm('本当に削除しますか?');" action="{{ route('sujis.destroy', $suji) }}" method="post">
            @csrf
            @method('delete')                                        
            <button type="submit">削除</button>
          </form>
      
        </div>
      </article>

    </main>
    
    <footer class="d-flex justify-content-center align-items-center bg-light fixed-bottom" style="height: 60px;">                                                             
      <p class="text-muted small mb-0">&copy; 臨時列車スジアプリ All rights reserved.</p>
    </footer>

  </body>

</html>