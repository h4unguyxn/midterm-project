<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Chi tiết phiếu mượn
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <dl class="divide-y divide-gray-200 space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-600">Sinh viên</dt>
                        <dd class="text-sm text-gray-900 sm:col-span-2">
                            {{ $borrowRecord->student->name ?? 'Không có thông tin' }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-600">Sách</dt>
                        <dd class="text-sm text-gray-900 sm:col-span-2">
                            {{ $borrowRecord->book->title ?? 'Không có thông tin' }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-600">Ngày mượn</dt>
                        <dd class="text-sm text-gray-900 sm:col-span-2">
                            {{ \Carbon\Carbon::parse($borrowRecord->borrow_date)->format('d/m/Y') }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-600">Ngày trả</dt>
                        <dd class="text-sm text-gray-900 sm:col-span-2">
                            {{ \Carbon\Carbon::parse($borrowRecord->return_date)->format('d/m/Y') }}
                        </dd>
                    </div>
                </dl>

                <div class="mt-8 flex flex-wrap justify-end gap-2">
                    <a href="{{ route('borrow-records.edit', $borrowRecord->id) }}"
                       class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                        Chỉnh sửa
                    </a>
                    <form method="POST" action="{{ route('borrow-records.destroy', $borrowRecord->id) }}"
                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa phiếu mượn này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700">
                            Xóa
                        </button>
                    </form>
                    <a href="{{ route('borrow-records.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded hover:bg-gray-600">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
