@extends('layouts.main')
@section('content')


<div id="app">
  <x-com-modaldelete></x-com-modaldelete>
  <x-com-modalpesan></x-com-modalpesan>

   {{-- FOR MODAL FORM Service --}}
    <div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Laptop Service </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form 
              action="{{ route('laptop.pensiun.store') }}" 
              method="POST"
              v-if="statusLaptop == 'User'">
              <h4>Pengembalian dari User ke EDP</h4>
              @csrf
              <input 
                type="hidden"
                v-bind:value="id_laptop"
                name="id_laptop"
                >
              <input 
                type="hidden"
                {{-- v-bind:value="id_laptop" --}}
                name="keterangan"
                value="Service"
                >
              <div class="form-group">
                  <label for="no_laptop">No Laptop</label>
                  <input 
                    v-bind:value="no_laptop"
                    type="text" 
                    class="form-control disable" 
                    id="no_laptop" 
                    name="no_laptop"
                    readonly
                    >
              </div>

              <div class="form-group">
                  <label for="sn">SN</label>
                  <input 
                    {{-- v-bind:value="sn" --}}
                    type="text" 
                    class="form-control disable" 
                    placeholder="Serial Number Laptop" 
                    id="sn" 
                    name="sn"
                    >
              </div>
              
              <div class="form-group">
                <label for="recived_date">Tanggal Pengembalian</label>
                <input 
                  type="date" 
                  class="form-control" 
                  id="recived_date" 
                  placeholder="Tanggal Terima Barang" 
                  name="recived_date"
                  value="{{ old('recived_date', '') }}">
              </div>
              
              {{-- <div class="form-group">
                  <label for="user">User</label>
                  <input type="text" class="form-control" id="user" placeholder="User">
              </div> --}}

              <div class="form-group">
                  <label for="menyerahkan">Menyerahkan</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="menyerahkan" 
                    placeholder="User yang menyerahkan"
                    name="menyerahkan">
              </div>

              <div class="form-group">
                  <label for="menerima">Penerima</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="menerima" 
                    placeholder="User EDP yang menerima"
                    name="penerima">
              </div>

              <div class="form-group">
                <label for="">Kerusakan</label>
                <textarea id="" cols="30" rows="4" class="form-control" name="kerusakan"></textarea>
              </div>

              <div class="form-group">
                <label for="">Keterangan Pengecekan oleh EDP</label>
                <textarea id="" cols="30" rows="4" class="form-control" name="pengecekan"></textarea>
              </div>
              
              {{-- <div class="form-group">
                <label for="exampleFormControlSelect2">Keterangan Pengembalian</label>
                <select 
                  class="form-control" 
                  id="exampleFormControlSelect2"
                  name="keterangan">
                  <option>-- Pilih --</option>
                  <option value="pensiun">Pensiun</option>
                  <option value="resign">Resign</option>
                </select>
              </div> --}}

              


              {{-- <div class="form-group">
                  <label for="user">User</label>
                  <input type="text" class="form-control" id="user" placeholder="User">
              </div> --}}
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send message</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
            <form 
              action="{{ route('laptop.pensiun.store') }}" 
              method="POST"
              v-else-if="statusLaptop == 'Pending Service'">
              <h4>Penyerahan Ke Vendor</h4>
              @csrf
              <input 
                type="hidden"
                v-bind:value="id_laptop"
                name="id_laptop"
                >
              <input 
                type="hidden"
                {{-- v-bind:value="id_laptop" --}}
                name="keterangan"
                value="Service"
                >

                <input 
                type="hidden"
                {{-- v-bind:value="id_laptop" --}}
                name="sub_note_type"
                v-bind:value="statusLaptop"
                >

              <div class="form-group">
                  <label for="no_laptop">No Laptop</label>
                  <input 
                    v-bind:value="no_laptop"
                    type="text" 
                    class="form-control disable" 
                    id="no_laptop" 
                    name="no_laptop"
                    readonly
                    >
              </div>
              
              
              <div class="form-group">
                <label for="tgl_penyerahan">Tanggal Penyerahan</label>
                <input 
                  type="date" 
                  class="form-control" 
                  id="tgl_penyerahan" 
                  placeholder="Tanggal Terima Barang" 
                  name="tgl_penyerahan"
                  value="{{ old('tgl_penyerahan', '') }}">
              </div>

              <div class="form-group">
                <label for="vendor">Vendor</label>
                <select class="custom-select" name="vendor" required>
                  <option selected value="">-- Choose --</option>
                  <option value="CV. JODA JAYA ELECTRIC" {{ old('vendor', '')=='CV. JODA JAYA ELECTRIC' ? 'selected' : ''  }}>CV. JODA JAYA ELECTRIC</option>
                  <option value="PT. PLATINDO KARYA PRIMA" {{ old('vendor', '')=='PT. PLATINDO KARYA PRIMA' ? 'selected' : ''  }}>PT. PLATINDO KARYA PRIMA</option>
                  <option value="PT. WAHANA DATARINDO SEMPURANA" {{ old('vendor', '')=='PT. WAHANA DATARINDO SEMPURANA' ? 'selected' : ''  }}>PT. WAHANA DATARINDO SEMPURANA</option>
                  <option value="PT. MICROREKSA INFONET" {{ old('vendor', '')=='PT. MICROREKSA INFONET' ? 'selected' : ''  }}>PT. MICROREKSA INFONET</option>
                  <option value="PT. KERTAYASA UTAMA" {{ old('vendor', '')=='PT. KERTAYASA UTAMA' ? 'selected' : ''  }}>PT. KERTAYASA UTAMA</option>
                  <option value="SURYA MANDIRI" {{ old('vendor', '')=='SURYA MANDIRI' ? 'selected' : ''  }}>SURYA MANDIRI</option>
                </select> 
                @if ($errors->has('vendor')) 
                  <span class="text-danger">{{ $errors->first('vendor') }}</span> 
                @endif
              </div>

              
              
              {{-- <div class="form-group">
                  <label for="user">User</label>
                  <input type="text" class="form-control" id="user" placeholder="User">
              </div> --}}

              <div class="form-group">
                  <label for="menyerahkan">Menyerahkan</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="menyerahkan" 
                    placeholder="User EDP yang menyerahkan"
                    name="menyerahkan">
              </div>

              <div class="form-group">
                  <label for="menerima">Penerima</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="menerima" 
                    placeholder="User Vendor yang menerima"
                    name="penerima">
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send message</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>

            </form>
            <form 
              action="{{ route('laptop.pensiun.store') }}" 
              method="POST"
              v-else-if="statusLaptop == 'On Service'">
              <h4>Penyerahan Ke DNP setelah Service</h4>
              @csrf
              <input 
                type="hidden"
                v-bind:value="id_laptop"
                name="id_laptop"
                >
              <input 
                type="hidden"
                {{-- v-bind:value="id_laptop" --}}
                name="keterangan"
                value="Service"
                >

                <input 
                type="hidden"
                {{-- v-bind:value="id_laptop" --}}
                name="sub_note_type"
                v-bind:value="statusLaptop"
                >

              <div class="form-group">
                  <label for="no_laptop">No Laptop</label>
                  <input 
                    v-bind:value="no_laptop"
                    type="text" 
                    class="form-control disable" 
                    id="no_laptop" 
                    name="no_laptop"
                    readonly
                    >
              </div>
              
              
              <div class="form-group">
                <label for="tgl_penyerahan">Tanggal Penyerahan</label>
                <input 
                  type="date" 
                  class="form-control" 
                  id="tgl_penyerahan" 
                  placeholder="Tanggal Terima Barang" 
                  name="tgl_penyerahan"
                  value="{{ old('tgl_penyerahan', '') }}">
              </div>

              <div class="form-group">
                <label for="vendor">Vendor</label>
                <select class="custom-select" name="vendor" required>
                  <option selected value="">-- Choose --</option>
                  <option value="CV. JODA JAYA ELECTRIC" {{ old('vendor', '')=='CV. JODA JAYA ELECTRIC' ? 'selected' : ''  }}>CV. JODA JAYA ELECTRIC</option>
                  <option value="PT. PLATINDO KARYA PRIMA" {{ old('vendor', '')=='PT. PLATINDO KARYA PRIMA' ? 'selected' : ''  }}>PT. PLATINDO KARYA PRIMA</option>
                  <option value="PT. WAHANA DATARINDO SEMPURANA" {{ old('vendor', '')=='PT. WAHANA DATARINDO SEMPURANA' ? 'selected' : ''  }}>PT. WAHANA DATARINDO SEMPURANA</option>
                  <option value="PT. MICROREKSA INFONET" {{ old('vendor', '')=='PT. MICROREKSA INFONET' ? 'selected' : ''  }}>PT. MICROREKSA INFONET</option>
                  <option value="PT. KERTAYASA UTAMA" {{ old('vendor', '')=='PT. KERTAYASA UTAMA' ? 'selected' : ''  }}>PT. KERTAYASA UTAMA</option>
                  <option value="SURYA MANDIRI" {{ old('vendor', '')=='SURYA MANDIRI' ? 'selected' : ''  }}>SURYA MANDIRI</option>
                </select> 
                @if ($errors->has('vendor')) 
                  <span class="text-danger">{{ $errors->first('vendor') }}</span> 
                @endif
              </div>

              
              
              {{-- <div class="form-group">
                  <label for="user">User</label>
                  <input type="text" class="form-control" id="user" placeholder="User">
              </div> --}}

              <div class="form-group">
                  <label for="menyerahkan">Menyerahkan</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="menyerahkan" 
                    placeholder="User EDP yang menyerahkan"
                    name="menyerahkan">
              </div>

              <div class="form-group">
                  <label for="menerima">Penerima</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="menerima" 
                    placeholder="User Vendor yang menerima"
                    name="penerima">
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send message</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>

            </form>
            <h4
              v-else>Status Laptop Invalid</h4>
          </div>
        </div>
      </div>
    </div>
  {{-- FOR MODAL FORM Service --}}

    {{-- FOR MODAL FORM PENSIUN --}}
  <div class="modal fade" id="pensiun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Penyerahan Laptop</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form 
            action="{{ route('laptop.pensiun.store') }}" 
            method="POST"
            v-if="statusLaptop == 'User'">
            @csrf
            <input 
              type="hidden"
              v-bind:value="id_laptop"
              name="id_laptop"
              >
            <div class="form-group">
                <label for="no_laptop">No Laptop</label>
                <input 
                  v-bind:value="no_laptop"
                  type="text" 
                  class="form-control disable" 
                  id="no_laptop" 
                  name="no_laptop"
                  readonly
                  >
            </div>
            
            <div class="form-group">
              <label for="recived_date">Tanggal Pengembalian</label>
              <input 
                type="date" 
                class="form-control" 
                id="recived_date" 
                placeholder="Tanggal Terima Barang" 
                name="recived_date"
                value="{{ old('recived_date', '') }}">
            </div>
            
            {{-- <div class="form-group">
                <label for="user">User</label>
                <input type="text" class="form-control" id="user" placeholder="User">
            </div> --}}

            <div class="form-group">
                <label for="menyerahkan">Menyerahkan</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="menyerahkan" 
                  placeholder="User yang menyerahkan"
                  name="menyerahkan">
            </div>

            <div class="form-group">
                <label for="menerima">Penerima</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="menerima" 
                  placeholder="User EDP yang menerima"
                  name="penerima">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Keterangan Pengembalian</label>
              <select 
                class="form-control" 
                id="exampleFormControlSelect2"
                v-model="keteranganPengembalian"
                name="keterangan">
                <option value="" selected>-- Choese --</option>
                <option value="pensiun">Pensiun</option>
                <option value="resign">Resign</option>
                <option value="Lainnya">Lainnya</option>
                {{-- <optidak Ada Historion>Lainnya</option> --}}
              </select>
            </div>

            <div 
              class="form-group"
              v-if="keteranganPengembalian == 'Lainnya'">
              <input 
                  type="text" 
                  class="form-control" 
                  id="lainnya " 
                  placeholder="Keterangan Pengembalian"
                  name="lainnya">
            </div>

            


            {{-- <div class="form-group">
                <label for="user">User</label>
                <input type="text" class="form-control" id="user" placeholder="User">
            </div> --}}
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Send message</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
          
          <h4 v-else>Status Laptop Invalid</h4>
        </div>
        
      </div>
    </div>
  </div>
  {{-- FOR MODAL FORM PENSIUN --}}


  
  {{-- ========== MODAL PENYERAHAN ================ --}}
  <div class="modal fade" id="penyerahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Penyerahan Laptop</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form 
            action="{{ route('laptop.pensiun.store') }}" 
            method="POST"
            v-if="statusLaptop == 'EDP'">
            <h4>Penyerahan Ke User</h4>
            @csrf
            <input 
              type="hidden"
              v-bind:value="id_laptop"
              name="id_laptop"
              >
            <input 
              type="hidden"
              {{-- v-bind:value="id_laptop" --}}
              name="keterangan"
              value="Penyerahan"
              >

              <input 
              type="hidden"
              {{-- v-bind:value="id_laptop" --}}
              name="sub_note_type"
              v-bind:value="statusLaptop"
              >

            <div class="form-group">
                <label for="no_laptop">No Laptop</label>
                <input 
                  v-bind:value="no_laptop"
                  type="text" 
                  class="form-control disable" 
                  id="no_laptop" 
                  name="no_laptop"
                  readonly
                  >
            </div>
            
            
            <div class="form-group">
              <label for="tgl_penyerahan">Tanggal Penyerahan</label>
              <input 
                type="date" 
                class="form-control" 
                id="tgl_penyerahan" 
                placeholder="Tanggal Terima Barang" 
                name="tgl_penyerahan"
                value="{{ old('tgl_penyerahan', '') }}">
            </div>

            <div class="form-group">
                <label for="menyerahkan">Menyerahkan</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="menyerahkan" 
                  placeholder="User EDP yang menyerahkan"
                  name="menyerahkan">
            </div>

           

            <div class="form-group">
                <label for="menerima">Penerima</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="menerima" 
                  placeholder="User yang menerima"
                  name="penerima">
            </div>

             <div class="form-group">
              <label for="section">Departement</label>
              <select 
                class="form-control" 
                id="section"
                name="departement">
                <option value="" selected>-- Choese --</option>
                @if(isset($data_section))
                  <optgroup label="Pulogadung">
                    @foreach ( $data_section['data_section_plg'] as $value)
                      <option value="{{ $value->section_name }} | {{ $value->section_name_as }} | Pulogadung" {{ old('departement') == "$value->section_name" . ' | ' . "$value->section_name_as" ? 'selected' : '' }}>{{ $value->section_name }}</option>
                    @endforeach
                  </optgroup>
                  <optgroup label="Krawang">
                    @foreach ( $data_section['data_section_krw'] as $value)
                      <option value="{{ $value->section_name }} | {{ $value->section_name_as }} | Krawang" {{ old('departement') == "$value->section_name" . ' | ' . "$value->section_name_as" ? 'selected' : '' }}>{{ $value->section_name }}</option>
                    @endforeach
                  </optgroup>
                @else
                    {{-- <option value="{{ old('section') }}" selected>{{ old('section') }}</option> --}}
                @endif
              </select>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Send message</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </form>
          <form 
            action="{{ route('laptop.pensiun.store') }}" 
            method="POST"
            v-else-if="statusLaptop == 'Service Completed'">
            <h4>Penyerahan Ke User</h4>
            @csrf
            <input 
              type="hidden"
              v-bind:value="id_laptop"
              name="id_laptop"
              >
            <input 
              type="hidden"
              {{-- v-bind:value="id_laptop" --}}
              name="keterangan"
              value="Service"
              >

              <input 
              type="hidden"
              {{-- v-bind:value="id_laptop" --}}
              name="sub_note_type"
              v-bind:value="statusLaptop"
              >

            <div class="form-group">
                <label for="no_laptop">No Laptop</label>
                <input 
                  v-bind:value="no_laptop"
                  type="text" 
                  class="form-control disable" 
                  id="no_laptop" 
                  name="no_laptop"
                  readonly
                  >
            </div>
            
            
            <div class="form-group">
              <label for="tgl_penyerahan">Tanggal Penyerahan</label>
              <input 
                type="date" 
                class="form-control" 
                id="tgl_penyerahan" 
                placeholder="Tanggal Terima Barang" 
                name="tgl_penyerahan"
                value="{{ old('tgl_penyerahan', '') }}">
            </div>

            <div class="form-group">
                <label for="menyerahkan">Menyerahkan</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="menyerahkan" 
                  placeholder="User EDP yang menyerahkan"
                  name="menyerahkan">
            </div>

            <div class="form-group">
                <label for="menerima">Penerima</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="menerima" 
                  placeholder="User yang menerima"
                  name="penerima">
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Send message</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </form>
          <h4
            v-else=''>Status Laptop Invalid</h4>
        </div>
        
      </div>
    </div>
  </div>
  {{-- ========== MODAL PENYERAHAN ================ --}}


  <div class="modal fade bd-show-modal-lg box-modal-form-laptop" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Laptop @{{ laptop[0].no_laptop }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <h5 class="">Data Laptop</h5>
                <div class="row no-gutter">
                  <div class="col-lg-6">
                    <div class="label-row">
                      <p class="mb-0"> <span class="label">User</span>: @{{ laptop[0].user }}</p>
                    </div>
                    <div class="label-row">
                      <p class="mb-0"> <span class="label">No Laptop</span>: @{{ laptop[0].no_laptop }}</p>
                    </div>
                    {{-- <div class="label-row">
                      <p class="mb-0"> <span class="label">Division</span>: @{{ laptop[0].division }}</p>
                    </div> --}}
                    <div class="label-row">
                      <p class="mb-0"> <span class="label">Departement</span>: @{{ laptop[0].departement }}</p>
                    </div>
                    <div class="label-row">
                      <p class="mb-0"> <span class="label">Location</span>: @{{ laptop[0].location }}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <h5 class="mb-3">Data History Laptop</h5>
                <div class="row no-gutter">
                  <div class="col-lg-12">
                    <div
                      v-if="laptop[1] != ''"
                      id="modal-body-data-laptop"
                    >
                      
                    </div>
                    <div 
                      id="modal-body-data-laptop"
                      v-else>
                      <h2>Tidak Ada History</h2>
                    </div>
                  {{-- </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
  


  
  

  <div class="container-option-action" id="container-ball">
      <div 
        class="ball animate__fadeInDown" 
        v-on:click="service(this)" 
        data-toggle="modal" 
        data-target="#service" 
        data-whatever="@mdo" 
        id="btn-service">Service Laptop 
      </div>

      <div 
        class="ball animate__fadeInDown" 
        @click="pensiun(this)"
        data-toggle="modal" 
        data-target="#pensiun" 
        data-whatever="@fat"
        id="btn-pensiun">Pengembalian Laptop Pensius/Resign</div>

        <div 
        class="ball animate__fadeInDown" 
        @click="pensiun(this)"
        data-toggle="modal" 
        data-target="#penyerahan" 
        data-whatever="@fat"
        id="btn-penyerahan">Penyerahan Laptop ke User</div>
    </div>
    <div class="overlay" id="overlay">
    </div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2 v-on:click="">Data Laptop DNP <small></small></h2>
                {{-- <button class="btn btn-sm btn-primary" v-on:click="pensiun">test kocak</button> --}}
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                      class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card-box table-responsive">
                            <div class="form-check d-inline">
                                <label class="form-check-label">
                                    {{-- <input type="checkbox" class="form-check-input" name="" id="incomplete" value="checkedValue"> --}}
                                    {{-- Show Data @{{ message }} --}}
                                    {{-- <input type="text" v-model="message" class="form-control"> --}}
                                    
                                </label>
                            </div>

                            <table id="table-data2" class="table table-hover table-sm table-striped table-bordered style1 rounded" style="width:100%; border-radius: 8px;">
                              <thead>
                                <tr>
                                  <th>Status</th>
                                  <th>No Laptop</th>
                                  <th>User Penerima Awal</th>
                                  <th>User Saat Ini</th>
                                  <th>Departement</th>
                                  {{-- <th>Division</th> --}}
                                  <th>Location</th>
                                  <th>Action</th>
                                </tr>
                              </thead>

                              <tbody id="tbody">
                                
                              </tbody>
                            </table>

                            {{-- <td>
                              <button class="btn btn-sm"><i class="fa fa-pencil"></i></button>
                            </td> --}}


                            
                            {{-- <div id="app" app-data="true">
                              <v-app id="inspire">
                                <template>
                                  <v-card>
                                    <v-card-title>
                                      Data Laptop
                                      <v-spacer></v-spacer>
                                      <v-text-field
                                        v-model="search"
                                        append-icon="mdi-magnify"
                                        label="Search"
                                        single-line
                                        
                                        hide-details
                                      ></v-text-field>
                                    </v-card-title>

                                    <v-data-table
                                        :headers="headers"
                                        :items="laptops"
                                        :search="search"
                                        :sort-desc="[false, true]"
                                        multi-sort
                                      >
                                    </v-data-table>

                                    

                                  </v-card>
                                </template>
                              </v-app>
                                
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
  <div class="col-12">hardware specifications</div>
</div>


@endsection

@section('style')
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
@endsection


@section('data-table')
 

    <!-- Datatables -->

        <script src=" {{ asset("/admin/vendors/datatables.net/js/jquery.dataTables.min.js") }}"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
        
        <script src=" {{ asset("/admin/vendors/datatables.net/js/moment.min.js") }}"></script>

        
        <script src=" {{ asset("/admin/vendors/datatables.net/js/dataTables.autoFill.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net/js/dataTables.select.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net/js/select.dataTables.js") }}"></script>

        
        <script src=" {{ asset("/admin/vendors/datatables.net/js/datetime-moment.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/jszip/dist/jszip.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/pdfmake/build/pdfmake.min.js") }}"></script>
        <script src=" {{ asset("/admin/vendors/pdfmake/build/vfs_fonts.js") }}"></script>

    <script>
      
      var data = "";
      var vueGo = true;
      var data2 = false;


      Object.size = function(obj) {
        var size = 0,
          key;
        for (key in obj) {
          if (obj.hasOwnProperty(key)) size++;
        }
        return size;
      };

// Get the size of an object

      function showBtnClick(el) {
        var el_modal = $('#modal-body-data-laptop');
        var idLaptop = $(el).data('id');
        var noLaptop = $(el).data('nolaptop');
        // console.log(idLaptop);
        axios.get("/laptop/" + idLaptop)
          .then(response => {
            // console.log(response);
            var a = app._data.laptop = response.data;
            var histories_laptop = a[1];
            // console.log(a[1][0].description);
            if(histories_laptop.length) {
              var no = 1;
              var els = '';


              histories_laptop.forEach(element => {
                var histori = element;
                // console.log(histori.note_type);
                if(element.note_type == 'Pengembalian') {
                  els += `
                    <div class="row box-container-histori">
                        <div class='col-12 pb-0'> 
                          <div class='d-flex justify-content-between'> 
                            <h6>${ no }. ${ element.note_type } - ${ element.sub_note_type } </h6>
                            <button
                              class="btn" 
                              type="button" data-toggle="collapse" data-target="#box-histori-${ no }" 
                              style=" width: 20px;
                                      height: 20px;
                                      overflow: hidden;
                                      text-align: center;
                                      font-size: 12px;
                                      line-height: 20px;
                                      padding: 0;"
                              aria-expanded="false" aria-controls="collapseExample">
                              <i class='fa fa-chevron-up'> </i>
                            </button> 
                          </div>
                        </div>
                        <div class="col-lg-12 pb-3 px-3 pt-0 collapse show" id='box-histori-${ no }'>
                          <p class='m-1'><span class="label">User Yang Menyerahkan</span> : ${ element.description.user_menyerahkan }</p>
                          <p class='m-1'><span class="label">EDP Yang Menerima</span> : ${ element.description.edp_penerima }</p>
                          <p class='m-1'><span class="label">Tanggal Menyerahkan</span> : ${ element.description.tanggal_terima }</p>
                        </div>
                    </div>
                  `;
                } else if (element.note_type == 'Penyerahan') {
                   els += `
                    <div class="row box-container-histori">
                        <div class='col-12 pb-0'> 
                          <div class='d-flex justify-content-between'> 
                            <h6>${ no }. ${ element.note_type } - ${ element.sub_note_type } </h6>
                            <button
                              class="btn" 
                              type="button" data-toggle="collapse" data-target="#box-histori-${ no }" 
                              style=" width: 20px;
                                      height: 20px;
                                      overflow: hidden;
                                      text-align: center;
                                      font-size: 12px;
                                      line-height: 20px;
                                      padding: 0;"
                              aria-expanded="false" aria-controls="collapseExample">
                              <i class='fa fa-chevron-up'> </i>
                            </button> 
                          </div>
                        </div>
                        <div class="col-lg-12 pb-3 px-3 pt-0 collapse show" id='box-histori-${ no }'>
                          <p class='m-1'><span class="label">EDP Yang Menyerahkan</span> : ${ element.description.edp_menyerahkan }</p>
                          <p class='m-1'><span class="label">User Yang Menerima</span> : ${ element.description.user_penerima }</p>
                          <p class='m-1'><span class="label">Departement</span> : ${ element.description.departement }</p>
                          <p class='m-1'><span class="label">Tanggal Menyerahkan</span> : ${ element.description.tgl_penyerahan }</p>
                        </div>
                    </div>
                  `;
                } else if (element.note_type == 'Service') {
                  var data_service = element.description;
                  var pengembalian_ke_edp = data_service.pengembalian_ke_edp; 
                  var penyerahan_ke_vendor = data_service.penyerahan_ke_vendor; 
                  var penyerahan_ke_dnp = data_service.penyerahan_ke_dnp; 
                  var penyerahan_ke_user = data_service.penyerahan_ke_user; 
                  console.log(data_service);
                  // console.log(Object.size(pengembalian_ke_edp));
                  // $('#modal-body-data-laptop').append()
                  els += `
                    <div class="row box-container-histori">
                        <div class='col-12 pb-0'> 
                          <div class='d-flex justify-content-between'> 
                            <h6>${ no }. ${ element.note_type } - ${ element.sub_note_type } </h6>
                            <button
                              class="btn" 
                              type="button" data-toggle="collapse" data-target="#box-histori-${ no }" 
                              style=" width: 20px;
                                      height: 20px;
                                      overflow: hidden;
                                      text-align: center;
                                      font-size: 12px;
                                      line-height: 20px;
                                      padding: 0;"
                              aria-expanded="false" aria-controls="collapseExample">
                              <i class='fa fa-chevron-up'> </i>
                            </button> 
                          </div>
                        </div>

                        <div class="col-lg-12 pb-3 px-3 pt-0 collapse show" id='box-histori-${ no }'>
                      `;

                        if (Object.size(pengembalian_ke_edp) > 0) {
                          els += `
                          <div class="mb-3">
                            <h6>
                              Pengembalian User -> EDP
                            </h6>
                            <p class='m-1'><span class="label">Tanggal Menyerahkan</span> : ${ pengembalian_ke_edp.tanggal_terima }</p>
                            <p class='m-1'><span class="label">Serial Number</span> : ${ pengembalian_ke_edp.sn }</p>
                            <p class='m-1'><span class="label">User Yang Menyerahkan</span> : ${ pengembalian_ke_edp.user_menyerahkan }</p>
                            <p class='m-1'><span class="label">EDP Yang Menerima</span> : ${ pengembalian_ke_edp.edp_penerima }</p>
                            <p class='m-1'><span class="label">Kerusakan</span> : ${ pengembalian_ke_edp.kerusakan }</p>

                          </div>
                          `;
                        } 

                        if (Object.size(penyerahan_ke_vendor) > 0) {
                          els += `
                          <div class="mb-3">
                            <h6>
                             Penyerahan EDP -> Vendor
                            </h6>
                            <p class='m-1'><span class="label">Tanggal Menyerahkan</span> : ${ penyerahan_ke_vendor.tgl_penyerahan }</p>
                            <p class='m-1'><span class="label">Vendor</span> : ${ penyerahan_ke_vendor.vendor }</p>
                            <p class='m-1'><span class="label">EDP Yang Menyerahkan</span> : ${ penyerahan_ke_vendor.edp_menyerahkan }</p>
                            <p class='m-1'><span class="label">Vendor Yang Menerima</span> : ${ penyerahan_ke_vendor.vendor_menerima }</p>

                          </div>
                          `;
                        }

                        if (Object.size(penyerahan_ke_dnp) > 0) {
                          els += `
                          <div class="mb-3">
                            <h6>
                             Penyerahan Vendor -> EDP
                            </h6>
                            <p class='m-1'><span class="label">Tanggal </span> : ${ penyerahan_ke_dnp.tgl_penyerahan }</p>
                            <p class='m-1'><span class="label">Vendor</span> : ${ penyerahan_ke_dnp.vendor }</p>
                            <p class='m-1'><span class="label">Vendor Yang Menyerahkan</span> : ${ penyerahan_ke_dnp.vendor_menyerahkan }</p>
                            <p class='m-1'><span class="label">EDP Yang Menerima</span> : ${ penyerahan_ke_dnp.edp_penerima }</p>

                          </div>
                          `;
                        }

                        if (Object.size(penyerahan_ke_user) > 0) {
                          els += `
                          <div class="mb-3">
                            <h6>
                             Penyerahan EDP -> User
                            </h6>
                            <p class='m-1'><span class="label">Tanggal </span> : ${ penyerahan_ke_user.tgl_penyerahan }</p>
                            <p class='m-1'><span class="label">EDP Yang Menyerahkan</span> : ${ penyerahan_ke_user.edp_menyerahkan }</p>
                            <p class='m-1'><span class="label">User Yang Menerima</span> : ${ penyerahan_ke_user.user_penerima }</p>

                          </div>
                          `;
                        }

                  els += `  
                        </div>
                    </div>`;
                }

                $('#modal-body-data-laptop').append(els);

                els = '';
                
                no++;
              });

              

              $('#showModal').on('hidden.bs.modal', function (e) {
                $('#modal-body-data-laptop').html('');
              });
              // console.log(histories_laptop);
            } else {
              console.log('safsafsaf');
            }
          });
      }

      

      function showBall (el)  {
        let button = $(el);
        let id = button.data('id');
        let no_laptop = button.data('nolaptop');
        let statuslaptop = button.data('statuslaptop');
        let oft = button.offset().top;
        let ofl = button.offset().left;
        // console.log(button.position());

        $("#btn-service").attr('data-id', id);
        $("#btn-service").attr('data-noLaptop', no_laptop);
        $("#btn-service").attr('data-statuslaptop', statuslaptop);

        $("#btn-pensiun").attr('data-id', id);
        $("#btn-pensiun").attr('data-noLaptop', no_laptop);
        $("#btn-pensiun").attr('data-statuslaptop', statuslaptop);
        
        $("#btn-penyerahan").attr('data-id', id);
        $("#btn-penyerahan").attr('data-noLaptop', no_laptop);
        $("#btn-penyerahan").attr('data-statuslaptop', statuslaptop);
        // console.log($("#btn-service"));
        // console.log('safasfsaf');
        

        $('#container-ball').css('zIndex', 2);
        $('#container-ball').css('left', ofl + 28);
        $('#container-ball').css('top', oft + 20);
        $('#overlay').css('zIndex', 1);
      }
      
        $.fn.dataTable.moment( 'DD-MM-YYYY' );
        var table = "";

         axios
              .get('/laptop_get_data')
              .then( response => {
                this.laptops = response.data;
                data = response.data;
                response.data.forEach(element => {
                  $('#tbody').append(`
                    <tr>
                      <td>${ element.status }</td>
                      <td>${ element.no_laptop }</td>
                      <td>${ element.user }</td>
                      <td>${ element.current_user }</td>
                      <td>${ element.departement }</td>
                      <td>${ element.location }</td>
                      <td>
                        <button class="btn btn-sm btn-warning text-white"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-sm btn-success btn-more" data-id="${ element.id }" data-noLaptop="${ element.no_laptop }" data-statuslaptop="${ element.status }" onclick='showBall(this)'>
                          <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <button class="btn btn-sm btn-info btn-show text-white" type="button" data-toggle="modal" data-target="#showModal" data-id="${ element.id }" data-noLaptop="${ element.no_laptop }" data-statuslaptop="${ element.status }" onclick="showBtnClick(this)">
                          <i class="fa fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  `);
                  
                  // console.log(element.id)
                });

                  table = $("#table-data2").on('init.dt', function () {
                    // vueGo = true;
                    data2 = true;
                    // console.log(data2);

                  }).dataTable({
                      // "processing": true,
                      // "serverSide": true,
                      "scrollY": 400,
                      "scrollX": true,
                      "scrollCollapse": true,
                      "autoFill": true,
                      // "select": "multi",
                      // "paging": false,
                      "paging" : true,
                      "ordering" : true,
                      // "scrollCollapse" : true,
                      "searching" : true,
                      // "columnDefs" : [{"targets":3, "type":"date-eu"}],
                      "bInfo": true,
                      "orderMulti": true,
                      // "fixedHeader": true,
                      dom: "Blfrtip",
                      buttons: [
                          {
                              extend: "copy",
                              className: "btn-sm",
                          },
                          {
                              extend: "csv",
                              className: "btn-sm",
                          },
                          {
                              extend: "excel",
                              className: "btn-sm",
                          },
                          {
                              extend: "pdfHtml5",
                              className: "btn-sm",
                          },
                          {
                              extend: "print",
                              className: "btn-sm",
                          },
                      ],
                      responsive: true,
                      // "ajax" : urlAjax
                  });


                   


                   
              })

              //  $('#table-data2 tbody').on('click', 'tr', function () {
              //     var data = table.row( this ).data();
              // } );

              // $('#table-data2 tbody').on('click', 'tr', function () {
              //     $(this).toggleClass('selected');
              // } );



        
        // var urlAjax = `/laptop_get_data`;
        // $('#table-data').DataTable( {
        //     ajax: {
        //         url: '/laptop_get_data',
        //         dataSrc: ''
        //     },
        //     columns: [
        //       { data: 'no_laptop' },
        //       { data: 'user' },
        //       { data: 'departement' },
        //       { data: 'division' },
        //     ],

        //     // columnDefs: [ {
        //     //     "targets": -1,
        //     //     "data": null,
        //     //     "defaultContent": "<button>Click!</button>"
        //     // } ]

        // } );
        // $.ajax({
        //     url: urlAjax, //or you can use url: "company/"+id,
        //     type: "GET",
        //     success: function (response) {
        //         $("#table-data").html(response.html);
        //         // conso
        //         console.log(response)
        //         // init_DataTables();
        //         // le.log(response);
        //     },

        //     error: function (msg) {
        //         // console.log(msg)
        //     },
        // });

    </script>
@endsection


@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script> --}}
    
  <script>
    
    // var app = new Vue({
    //   el: "#app",
    //   data: {
    //     message: 'ngablu'
    //   }
    // });
    
      var app = new Vue({
        el: '#app',
        data: {
          keteranganPengembalian: '',
          message: 'safsafsafasf',
          no_laptop: 'safsafsaf',
          id_laptop: '',
          statusLaptop: '',
          laptop: {
            0: {
              no_laptop: 'saf'
            },
            1: [{

            }]
          },
        },

        methods: {
          service: function(el) {
            this.no_laptop = el.event.target.getAttribute('data-nolaptop');
            this.id_laptop = el.event.target.getAttribute('data-id');
            this.statusLaptop = el.event.target.getAttribute('data-statuslaptop');
            console.log('service btn');
          },
          
          pensiun: function (el) {
            this.no_laptop = el.event.target.getAttribute('data-nolaptop');
            this.id_laptop = el.event.target.getAttribute('data-id');
            this.statusLaptop = el.event.target.getAttribute('data-statuslaptop');
            console.log('pensiun btn');
          },
        }
      });


      // app._data.message = "safsafasfsafasf";

        //  axios
        //       .get('/laptop_get_data')
        //       .then( response => {
        //         this.laptops = response.data;
        //         console.log(response.data);
        //         this.dafs = true;
        //       })

      // $('document').ready(function() { 
      //   $('#modalPesanEdit').modal('show') 
      // });
  </script>

  <script>

    $(document).ready(function() {
      $('#overlay').on('click', function () {
        $('#overlay').css('zIndex', -1);
        $('#container-ball').css('zIndex', -1);
      });
      
    });
  </script>
@endsection

