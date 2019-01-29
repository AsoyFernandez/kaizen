
                              <div class="modal fade" id="{{ $log->id . 'modal' }}">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title">Detail Seluruh Pengaduan</h3>
                                      </div>
                                      <div class="modal-body">
                                        <table class="table table-striped" id="tblGrid">
                                          <thead id="tblHead">
                                            <tr>
                                              <td>Kode</td>
                                              <td>Pelapor</td>
                                              <td>Ruang</td>
                                              <td>Deskripsi</td>
                                              <td>Tanggal</td>
                                              <td>Action</td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($log->pengaduans as $key)
                                            <tr>
                                              <td>PE{{ $key->id }}</td>
                                              <td>{{ $key->users->name }}</td>
                                              <td>{{ $key->tempats->nama }}</td>
                                              <td>
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $key->deskripsi }}">{{ str_limit($key->deskripsi, $limit = 10, $end = '...') }} </a>
                                              </td>
                                              <td>{{ $key->created_at->format('d/m/Y H:i') }}</td>
                                              <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                  </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->