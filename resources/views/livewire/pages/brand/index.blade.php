<div>
    <div class="page-header">
        <div class="page-title">
            <h4>Brand List </h4>
            <h6>Manage your Brand</h6>
        </div>
        <div class="page-btn">
            <a wire:navigate href="{{ route('brands.create') }}" class="btn btn-added"><img
                    src="{{ asset('admin/assets/img/icons/plus.svg') }}" class="me-2" alt="img">Add Brand</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{ asset('admin/assets/img/icons/filter.svg') }}" alt="img">
                            <span><img src="{{ asset('admin/assets/img/icons/closes.svg') }}" alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset">
                            <img src="http://localhost/admin/assets/img/icons/search-white.svg" alt="img"></a>
                            {{-- <input wire:model.debounce.300ms="search" type="text" class="form-control form-control-sm" placeholder="Search..."> --}}

                    </div>
                </div>

                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src="{{ asset('admin/assets/img/icons/pdf.svg') }}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                    src="{{ asset('admin/assets/img/icons/excel.svg') }}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src="{{ asset('admin/assets/img/icons/printer.svg') }}" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-12">
                                <form wire:submit.prevent="search">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input wire:model="searchName" type="text" placeholder="Search by Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input wire:model="searchDesc" type="text" placeholder="Search by Description">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-filters ms-auto">
                                                    <img src="{{ asset('admin/assets/img/icons/search-whites.svg') }}" alt="img">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="table-responsive">
                <table id="brandTable" class="table ">
                    <thead>
                        <tr>
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Image</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr wire:key="{{ $item->id }}">
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    <a class="product-img">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="Brand Image">
                                        @else
                                            <img src="{{ asset('admin/assets/img/product/noimage.png') }}"
                                                alt="Placeholder Image">
                                        @endif
                                    </a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->desc }}</td>
                                <td>
                                    <a class="me-3" wire:navigate href="{{ route('brands.edit', $item->id) }}">
                                        <img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="Edit">
                                    </a>
                                    <a class="me-3 " wire:click="delete({{ $item->id }})"
                                        data-brand-id="{{ $item->id }}">
                                        <img src="{{ asset('admin/assets/img/icons/delete.svg') }}" alt="Delete">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- pagination area --}}
                <div class="pagination mt-4" style="justify-content: flex-end;">
                    <div class="text-end mt-2">
                        {{ ($data->currentPage() - 1) * $data->perPage() + 1 }} -
                        {{ ($data->currentPage() - 1) * $data->perPage() + count($data->items()) }} of
                        {{ $data->total() }} items
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            @if ($data->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true"
                                        style="background: #637381; border-radius: 5px; color: #fff;">&lsaquo;</button>
                                </li>
                            @else
                                <li class="page-item">
                                    <button type="button" wire:click="previousPage" rel="prev"
                                        class="page-link"
                                        style="background: #ff9f43; border-color: #ff9f43; border-radius: 5px; color: #fff;">&lsaquo;</button>
                                </li>
                            @endif

                            @foreach ($data->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled" aria-disabled="true"><span
                                            class="page-link">{{ $element }}</span></li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $data->currentPage())
                                            <li class="page-item active" aria-current="page"><button type="button"
                                                    class="page-link"
                                                    style="background: #ff9f43; border-color: #ff9f43; border-radius: 5px; color: #fff;">{{ $page }}</button>
                                            </li>
                                        @else
                                            <li class="page-item"><button type="button"
                                                    wire:click="gotoPage({{ $page }})" class="page-link"
                                                    style="background: #637381; border-radius: 5px; color: #fff;">{{ $page }}</button>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            @if ($data->hasMorePages())
                                <li class="page-item">
                                    <button type="button" wire:click="nextPage" rel="next" class="page-link"
                                        style="background: #ff9f43; border-color: #ff9f43; border-radius: 5px; color: #fff;">&rsaquo;</button>
                                </li>
                            @else
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <span class="page-link" aria-hidden="true"
                                        style="background: #637381; border-color: #637381; border-radius: 5px; color: #fff;">&rsaquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                {{-- pagination area  end --}}

            </div>

        </div>
    </div>

    {{-- <div>
        <label for="perPage">Items per page:</label>
        <select wire:model="perPage" id="perPage">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <!-- Add more options as needed -->
        </select>

        <form wire:submit.prevent="render">
            <input wire:model="searchName" type="text" placeholder="Search by Name">
            <input wire:model="searchDesc" type="text" placeholder="Search by Description">
            <button type="submit">Search</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->desc }}</td>
                    <td>
                        <button wire:click="delete({{ $item->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $data->links() }}
    </div> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.datanew').on('click', '.me-3', function() {
                let brandIdToDelete = $(this).data('brand-id');
                @this.delete(brandIdToDelete);
            });
        });
    </script>

    {{-- <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('refreshDataTable', function () {
                // Reload the DataTable instance after deletion
                $('#brandTable').DataTable().ajax.reload();
            });
        });
    </script> --}}
</div>
