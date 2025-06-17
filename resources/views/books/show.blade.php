<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chi tiết sách</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <p><strong>Tiêu đề:</strong> {{ $book->title }}</p>
            <p><strong>Tác giả:</strong> {{ $book->author }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Số lượng:</strong> {{ $book->quantity }}</p>

            <a href="{{ route('books.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Quay lại</a>
        </div>
    </div>
</x-app-layout>
