<?php
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;
    use frontend\components\data\WildxApi;
    use common\models\User;
    
    $this->title = 'User Profile';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Profile';

    $ip = WildxApi::getIp()->all();

    list(
        $id, $account, $firstname, $lastname, $about, 
        $position, $phone, $adress, $telegram, $skype, 
        $useragent, $created_at, $avatar
    ) = User::getUserProfile();

    $name = $firstname.' '.$lastname;
    $photo = User::getUserAvatar($avatar);
    $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4>Ошибка!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-3">
        <div class="card card-purple card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?=Html::img($photo, 
                        [
                            'class' => 'profile-user-img img-fluid img-circle border-success',
                            'alt' => $name
                        ]
                    );?>
                </div>
                <?=Html::tag('h3', $name, ['class' => 'profile-username text-center']);?>
                <?=Html::tag('p', $position, ['class' => 'text-muted text-center']);?>
                <a href="/panel/setting/profile/update" class="btn bg-purple btn-block"><b>Edit Profile</b></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body">
                <strong><?=Icons::Location(22, 'mr-1');?> Location</strong>
                <?=Html::tag('p', $adress, ['class' => 'text-muted']);?>
                <hr>
                <strong><?=Icons::Note(22, 'mr-1');?> Notes</strong>
                <?=Html::tag('p', $about, ['class' => 'text-muted']);?>
            </div>
        </div>
        </div>
        <div class="col-md-4">
            <div class="card card-purple card-tabs">
                <div class="card-header p-0 pt-1 pl-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#activity" data-toggle="tab">
                                Роли
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#timeline" data-toggle="tab">
                                Timeline
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#settings" data-toggle="tab">
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <ul>
                            <?php foreach ($roles as $role) { ?>
                                <li>Роль: <?=$role->description;?></li>
                            <?php } ?>
                            <li>Язык: <?=$ip["language"];?></li>
                            <li>Адрес: <?=$ip["location"];?></li>
                            <li>Код: <?=$ip["phone_code"];?></li>
                            <li>Текущее время: <?=$ip["datetime"];?></li>
                            <li>Валюта: <?=$ip["currency"]["name"];?> / <?=$ip["currency"]["symbol"];?></li>
                        </ul>


                        <?php /*
                        <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>

                        <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                            <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                            </a>
                            </span>
                        </p>
                        </div>
                        <div class="post clearfix">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                            <span class="username">
                            <a href="#">Sarah Ross</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>
                        </div>
                        <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                            <span class="username">
                            <a href="#">Adam Jones</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row g-1 mb-3">
                            <div class="col-sm-6">
                            <img class="img-fluid" src="/admin/dist/img/posts/photo1.webp" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                <img class="img-fluid mb-3" src="/admin/dist/img/posts/photo2.webp" alt="Photo">
                                <img class="img-fluid" src="/admin/dist/img/posts/photo3.jpg" alt="Photo">
                                </div>
                                <div class="col-sm-6">
                                <img class="img-fluid mb-3" src="/admin/dist/img/posts/photo4.jpg" alt="Photo">
                                <img class="img-fluid" src="/admin/dist/img/posts/photo1.webp" alt="Photo">
                                </div>
                            </div>
                            </div>
                        </div>

                        <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                            <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                            </a>
                            </span>
                        </p>
                        </div>                        
                        */ ?>

                    </div>
                    <div class="tab-pane" id="timeline">
                        <div class="timeline timeline-inverse">
                            <div class="time-label">
                                <span class="bg-danger">
                                10 Feb. 2014
                                </span>
                            </div>
                            <div>
                                <i class="fas fa-envelope bg-primary"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-user bg-info"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-comments bg-warning"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                    Take me to your leader!
                                    Switzerland is small and neutral!
                                    We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                                </div>
                            </div>
                            <div class="time-label">
                                <span class="bg-success">
                                3 Jan. 2014
                                </span>
                            </div>
                            <div>
                                <i class="fas fa-camera bg-purple"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                </div>
                                </div>
                            </div>
                            <div>
                                <i class="far fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="settings">
                        <?php /*
                            <form>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="email" class="form-control" id="inputName" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="inputName2">Name</label>
                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="inputExperience">Experience</label>
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills">Skills</label>
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                            </form>                    
                        */ ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>