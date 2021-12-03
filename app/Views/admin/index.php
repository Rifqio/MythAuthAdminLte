<?= $this->extend('templates/index'); ?>
<?= $this->section('pageContent'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Welcome Admin</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User List</h3>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Deleted At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $u) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $u->username; ?></td>
                <td><?= $u->email; ?></td>
                <td><?= $u->name; ?></td>
                <td><?= $u->deleted_at; ?></td>
                <td>
                  <a href="<?= base_url('admin/' . $u->userid); ?>"><i class="fas fa-eye"></i></a>
                  <form action="/admin/<?= $u->userid;?>" class="d-inline" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button style="background: transparent; border: none !important; color: #007bff;"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->

  </section>

  <?= $this->endSection(); ?>