<div class="card my-4">
  <div class="card-body">
    <div class="d-flex flex-row row">

      <div class="col-3 text-center">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          <img class="profile-icon rounded-circle" src="{{ $user->profile_image }}" alt="プロフィールアイコン">
        </a>
      </div>

      <div class="col-9">

        <div class="row mb-5">

          <div class="col-6">
            <h2 class="h5 card-title font-weight-bold mb-3">
              <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                {{ $user->name }}
              </a>
            </h2>
            <p class="text-primary m-0">
              <i class="fas fa-clock mr-2"></i>目標起床時間：{{ $user->wake_up_time->format('H:i') }}
            </p>
            <p class="small m-0 text-muted">
              （ {{ $user->wake_up_time->copy()->subHour($user->range_of_success)->format('H:i') }} 〜 {{ $user->wake_up_time->format('H:i') }} に投稿できると早起き成功です ）
            </p>
          </div>

          <div class="col-6 row h-75">

            <div class="col-6 rounded peach-gradient d-flex align-items-center justify-content-center">
              <div class="text-white text-center d-flex align-items-center justify-content-center">
                <div class="bg-success text-white rounded-circle p-1 mr-2">{{ date('m') }}月</div>
                <div>
                  <p class="small m-0">早起き達成日数</p>
                  <p class="m-0">
                    <span class="h5 mr-1">{{ $user->achievement_days_count  }}</span>日目
                  </p>
                </div>
              </div>
            </div>

            <div class="col-6 text-center">
              @if(Auth::id() !== $user->id)
                  <follow-button
                  :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                  :authorized='@json(Auth::check())'
                  endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                  >
                  </follow-button>
              @else
              <a  href="{{ route('users.edit', ['name' => Auth::user()->name]) }}" class="btn btn-default m-0 d-block rounded h-100">
                プロフィール<br>編集
              </a>
              @endif
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-9 pr-0">
              @if (isset($user->self_introduction))
                <p class="mb-0">{{ $user->self_introduction }}</p>
              @endif
          </div>
        </div>

      </div>

    </div>
  </div>
  <div class="card-body">
    <div>
      <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted mr-3">
        {{ $user->count_followings }} フォロー
      </a>
      <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followers }} フォロワー
      </a>
    </div>
  </div>
</div>
