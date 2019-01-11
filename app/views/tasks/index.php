<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center p-3">
                <h1><?php echo $data['title']; ?></h1>
                <p>
                    This is MVC PHP framework.
                </p>
                <p>
                    You can build responsive, mobile-first projects with the world's most popular front-end component library - <a href="https://getbootstrap.com/docs/4.0/components/alerts/" target="#">Bootstrap</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    New Task
                </div>

                <div class="card-body">
                    <!-- New Task Form -->
                    <form action="<?php echo URLROOT; ?>/tasks/save" method="POST" class="form-horizontal">

                        <?php if ($data['error'] != '') { ?>
                            <div class="alert alert-danger" role="alert">
                                  <?php echo $data['error']; ?>
                            </div>
                        <?php } ?>

                        <!-- Task Name -->
                        <div class="form-group">
                            <div class="row mb-3">
                                <label for="task-title" class="col-sm-3 control-label">Task</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" id="task-title" class="form-control" placeholder="Task title">
                                </div>
                            </div>
                            <div class="row">
                                <label for="task-desc" class="col-sm-3 control-label">Task description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description" id="task-desc" class="form-control" placeholder="Task description">
                                </div>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
                <div class="card">
                    <div class="card-header">
                        Current Tasks
                    </div>

                    <div class="card-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <!-- foreach -->
                                <?php
                                foreach ($data['tasks'] as $task) {
                                ?>
                                    <tr>
                                            <td class="table-text"><div><?php echo $task->id; ?></div></td>
                                            <td class="table-text"><div><?php echo $task->title; ?></div></td>
                                            <td class="table-text"><div><?php echo $task->description; ?></div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" method="POST">
                                                <button type="submit" name="delete" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                if (empty($data['tasks'])) {
                                        echo '<tr>
                                        <td class="table-text"><div>Add some tasks...</div></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>


</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
