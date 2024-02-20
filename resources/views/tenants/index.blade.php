<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('tenants.create') }}">Add Tenants</x-btn-link>
        </h2>
    </x-slot>


    <div class="card-body">
      <div class="table-responsive">
          <table id="example" class="display" style="min-width: 845px">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Domain</th>
                      <th>Action</th>
                     
                  </tr>
              </thead>
              <tbody>
                @foreach($tenants as $tenant)
                  <tr>
                      <td>{{ $tenant->name }}</td>
                      <td>{{ $tenant->email }}</td>
                      <td>  @foreach($tenant->domains as $domain)
                        {{ $domain -> domain }} {{ $loop -> last ? '': ','}}
                      
                      @endforeach</td>
                      <td></td>
                  </tr>
                  @endforeach
          </table>
      </div>
  </div>
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
