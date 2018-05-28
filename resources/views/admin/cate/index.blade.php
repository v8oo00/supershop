@extends('layouts.admin')

@section('content')
<!-- page content -->
 <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Cates <small>Show all the classifications</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
    @foreach($cates as $cate)
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><b>{{ $cate->cate }}</b> <small>All categories below clothing</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ action('Admin\CateController@create',['id'=>$cate->id]) }}">添加子分类</a>
                      </li>
                      <li><a href="javascrip:" class="fufenlei" data-toggle="modal" data-target=".bs-example-modal-sm" cate_id="{{ $cate->id }}">修改分类名</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="shanchu" cate_id="{{ $cate->id }}"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                @if(count($cate->sub) > 0)
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cate</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cate->sub as $c)
                    <tr>
                      <th scope="row">{{ $c->id }}</th>
                      <td>{{ $c->cate }}</td>
                      <td>
                          <a href="javascript:" class="btn btn-info btn-xs ziedit" data-toggle="modal" data-target=".bs-example-modal-sm" cate_id="{{ $c->id }}"><i class="fa fa-pencil"></i> Edit </a>
                          <a href="javascript:" class="btn btn-danger btn-xs removezi" pid="{{ $c->pid }}"><i class="fa fa-trash-o"></i> Delete </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                    此分类下暂时没有子分类
                @endif
              </div>
            </div>
        </div>
    @endforeach
    </div>
    <!-- 模态框 -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Update Cate Name</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" style="padding-top:10px;">Cate <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" name="cate" type="text">
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>

          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $('.dropdown').click(function(){
            if($(this).find('a').attr('aria-expanded') == 'false'){
                $(this).addClass('open');
                $(this).find('a').attr('aria-expanded') == 'true';
            }else{
                $(this).removeClass('open');
                $(this).find('a').attr('aria-expanded') == 'false';
            }

        });

        //修改子分类名称
        $('.ziedit').click(function(){
            var cate = $(this).parent('td').prev().html();
            var _this = $(this);
            $('#name').val(cate);
            var cate_id = $(this).attr('cate_id');

            $('#name').blur(function(){
                var cate = $(this).val();
                $.ajax({
					url:"{{ action('Admin\CateController@update') }}",
					data:{id:cate_id,cate:cate},
					type:'post'
				});

                _this.parent('td').prev().html(cate);
                layer.msg('修改子分类名称成功');
            });
        });

        //删除子分类
        $('.removezi').click(function(){
            var id = $(this).parents('tr').find('th').html();
            var pid = $(this).attr('pid');
            var _this = $(this);

            $.ajax({
                url:"{{ action('Admin\CateController@delete') }}",
                data:{id:id},
                type:'get'
            })

            $.ajax({
                url:"{{ action('Admin\CateController@chaxun') }}",
                data:{id:pid},
                type:'get',
                success:function(mes){
                    if(mes == 'ok'){
                        _this.parents('tr').parents('.x_content').html('此分类下暂时没有子分类');
                        _this.parents('tr').parents('.table-hover').remove();
                    }else{
                        _this.parents('tr').remove();
                    }
                }
            });
            layer.msg('删除子分类成功');
        });

        //修改分类名称
        $('.fufenlei').click(function(){
            var cate = $(this).parents('ul').prev().find('b').html();
            $('#name').val(cate);
            var _this = $(this);
            var cate_id = $(this).attr('cate_id');

            $('#name').blur(function(){
                var cate = $(this).val();
                $.ajax({
					url:"{{ action('Admin\CateController@update') }}",
					data:{id:cate_id,cate:cate},
					type:'post'
				});

                _this.parents('ul').prev().find('b').html(cate);
                layer.msg('修改分类名称成功');
            });
        });

        //删除分类
        $('.shanchu').click(function(){
            var id = $(this).attr('cate_id');
            var _this = $(this);
            layer.confirm('您确认删除该分类？', {
                btn: ['确定','取消'] //按钮
            }, function(){

                $.ajax({
                    url:"{{ action('Admin\CateController@chaxun')}}",
                    data:{id:id},
                    type:'get',
                    success:function(mes){
                        if(mes=='ok'){
                            $.ajax({
                                url:"{{ action('Admin\CateController@delete')}}",
                                data:{id:id},
                                type:'get'
                            });
                            _this.parents('ul').parents('.x_panel').remove();
                            layer.msg('删除成功', {icon: 1});
                        }else{
                            layer.msg('由于该分类下存在子类故不能删除', {icon: 2});
                        }
                    }
                });
            });
        });


    </script>
@endsection
