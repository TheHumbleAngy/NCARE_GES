<?php
    /**
     * Created by PhpStorm.
     * User: Ange KOUAKOU
     * Date: 29-Aug-15
     * Time: 8:13 PM
     */
    require_once '../bd/connection.php';
?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 12px; font-weight: bolder">
            Fournisseurs
            <a href='form_principale.php?page=administration&source=fournisseurs' type='button'
               class='close' data-dismiss='alert' aria-label='Close' style='position: inherit'>
                <span aria-hidden='true'>&times;</span>
            </a>
        </div>
        <div class="panel-body" style="overflow: auto">
            <table border="0" class="table table-hover table-bordered ">
                <thead>
                <tr>
                    <!--<td class="entete" style="text-align: center">Code</td>-->
                    <th class="entete" style="text-align: center; width: 10%">Raison Sociale</th>
                    <th class="entete" style="text-align: center; width: 10%">Contacts</th>
                    <th class="entete" style="text-align: center; width: 10%">Adresse</th>
                    <th class="entete" style="text-align: center; width: 10%">Activite</th>
                    <th class="entete" style="text-align: center; width: 10%">Notes</th>
                    <?php //if (($_SESSION['type_utilisateur'] == 'administrateur') || ($_SESSION['type_utilisateur'] == 'moyens_genereaux')):?>
                    <th class="entete" style="width: 10%; text-align: center">Actions</th>
                    <?php //endif?>
                </tr>
                </thead>
                <?php
                    $req = "SELECT * FROM fournisseurs ORDER BY code_four ASC ";
                    if ($resultat = $connexion->query($req)) {
                        $ligne = $resultat->fetch_all(MYSQL_ASSOC);
                        foreach ($ligne as $list) {
                            ?>
                            <tr>
                                <!--<td><?php /*echo stripslashes($list['code_four']); */ ?></td>-->
                                <td><?php echo stripslashes($list['nom_four']); ?></td>
                                <td><?php echo "Tel: " . stripslashes($list['telephonepro_four']) . "<br>Fax: " . stripslashes($list['fax_four']) . "<br>Email: " . stripslashes($list['email_four']); ?></td>
                                <!--                                            <td>-->
                                <?php //echo stripslashes($list['fax_four']); ?><!--</td>-->
                                <!--                                            <td>-->
                                <?php //echo stripslashes($list['email_four']); ?><!--</td>-->
                                <td><?php echo stripslashes($list['adresse_four']); ?></td>
                                <td><?php echo stripslashes($list['activite_four']); ?></td>
                                <td><?php echo stripslashes($list['notes_four']); ?></td>
                                <?php //if (($_SESSION['type_utilisateur'] == 'administrateur') || ($_SESSION['type_utilisateur'] == 'moyens_genereaux')):?>
                                <td>
                                    <div style="text-align: center">
                                        <a class="btn btn-default modifier" data-toggle="modal"
                                           data-target="#modalModifier<?php echo stripslashes($list['code_four']); ?>">
                                            <img height="20" width="20" src="img/icons8/ball_point_pen.png"
                                                 title="Modifier"/>
                                        </a>
                                        <a class="btn btn-default modifier" data-toggle="modal"
                                           data-target="#modalSupprimer<?php echo stripslashes($list['code_four']); ?>">
                                            <img height="20" width="20" src="img/icons8/cancel.png" title="Supprimer"/>
                                        </a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade"
                                         id="modalModifier<?php echo stripslashes($list['code_four']); ?>"
                                         tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title"
                                                        id="modalModifier<?php echo stripslashes($list['code_four']); ?>">
                                                        Modifications</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <table>
                                                            <tr>
                                                                <td>Nom :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="text" class="form-control" onblur="this.value = this.value.toUpperCase();"
                                                                               id="nom_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['nom_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>E-mail :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="email"  class="form-control"
                                                                               id="email_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['email_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Contact Pro. :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="tel" class="form-control"
                                                                               id="telephonepro_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['telephonepro_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Acitivité :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="text"  class="form-control"
                                                                               id="activite_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['activite_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="tel"  class="form-control"
                                                                               id="fax_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['fax_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Addresse :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="text"  class="form-control"
                                                                               id="adresse_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['adresse_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Notes :</td>
                                                                <td>
                                                                    <label>
                                                                        <input type="text"  class="form-control"
                                                                               id="notes_four<?php echo $list['code_four']; ?>"
                                                                               value="<?php echo $list['notes_four']; ?>">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    <button class="btn btn-primary" data-dismiss="modal"
                                                            onclick="majInfos('<?php echo $list['code_four']; ?>')">
                                                        Enregistrer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade"
                                         id="modalSupprimer<?php echo stripslashes($list['code_four']); ?>"
                                         tabindex="-1"
                                         role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title"
                                                        id="modalSupprimer<?php echo stripslashes($list['code_four']); ?>">
                                                        Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Voulez-vous supprimer
                                                    le fournisseur <?php echo stripslashes($list['nom_four']); ?> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal">Non</button>
                                                    <button class="btn btn-primary" data-dismiss="modal"
                                                            onclick="suppressionInfos('<?php echo stripslashes($list['code_four']); ?>')">
                                                        Oui
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</div>

