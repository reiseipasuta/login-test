<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <ul>
                        <li>名前：{{ Auth::user()->name }}</li>
                        <li>メールアドレス：{{ Auth::user()->email }}</li>
                        <li>ユーザーID：{{ Auth::id() }}</li>
                    </ul>
                    <h3>投稿一覧</h3>
                    <ul>
                        @foreach ($contents as $content)
                            @if ($content->user_id === Auth::id())
                                <li>
                                    <a href="{{ route('contents', $content) }}">{{ $content->title }}</a>
                                    <a href="{{ route('change', $content) }}">【編集】</a>
                                    <form method="post" action="{{ route('delete', $content) }}">
                                        @csrf
                                        <button>【削除】</button>
                                    </form>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </div>
            </div>
            <a href="{{ route('top') }}">トップへ戻る</a>
        </div>
    </div>
</x-app-layout>
