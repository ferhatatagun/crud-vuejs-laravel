@extends('app')

@section('content')
<div class="form-group row add">
  <div class="col-md-12">
    <h1>Simple Laravel Vue.Js Crud </h1>
  </div>
  <div class="col-md-12">
    <button type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">
      Create New Post
    </button>

  </div>
</div>

<div class="row">
  <div class="table-responsive">
    <table class="table table-borderless">
      <tr>
        <th>Başlık Title</th>
        <th>Açıklama Desc</th>
        <th>Actions</th>
      </tr>
      <tr v-for="item in items">
        <td>@{{ item.title }}</td>
        <td>@{{ item.description }}</td>
        <td>
          <button class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
              <span class="glyphicon glyphicon-edit"></span> Edit
          </button>

          <button class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
              <span class="glyphicon glyphicon-trash"></span> Delete
          </button>

        </td>
      </tr>

    </table>

  </div>
</div>



<nav>
  <ul class="pagination">

    <li v-if="pagination.current_page > 1">
      <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page -1)">
        <span aria-hidden="true"> << </span>
      </a>
    </li>

    <li v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active' :']">
      <a href="#" @click.prevent="changePage(page)">
        @{{ page }}
      </a>
    </li>

    <li v-if="pagination.current_page < pagination.last_page">
      <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page +1)">
        <span aria-hidden="true"> >> </span>
      </a>
    </li>
  </ul>
</nav>
<!-- Create ITEm Modeli oluşturama -->

<div class="model fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModelLabel">
  <div class="modal-dialog" role="document">
    <div class="model-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Create New Posts</h4>
      </div>
      <div class="modal-body">
        <form  method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
          <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" name="title" class="form-control" v-model="newItem.title" />
              <span v-if="formErrors['title']" class="error text-danger">
                 @{{ formErrors['title'] }}
              </span>
          </div>
          <div class="form-group">
            <label for="title">Description :</label>
            <textarea name="description" class="form-control" v-model="newItem.description">
            </textarea>
              <span v-if="formErrors['description']" class="error text-danger">
                 @{{ formErrors['description'] }}
              </span>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success" name="button"> Sendd </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit ITem Model -->

<div class="model fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModelLabel">
  <div class="modal-dialog" role="document">
    <div class="model-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Posts </h4>
      </div>
      <div class="modal-body">
        <form  method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
          <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" name="title" class="form-control" v-model="fillItem.title" />
              <span v-if="formErrorsUpdate['title']" class="error text-danger">
                 @{{ formErrorsUpdate['title'] }}
              </span>
          </div>
          <div class="form-group">
            <label for="title">Description :</label>
            <textarea name="description" class="form-control" v-model="fillItem.description">
            </textarea>
              <span v-if="formErrorsUpdate['description']" class="error text-danger">
                 @{{ formErrorsUpdate['description'] }}
              </span>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success" name="button"> Sendd </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Create
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
-->
<!-- Edit
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  -->
</div>

</div>



















@stop
