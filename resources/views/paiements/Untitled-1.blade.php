<div class="modal fade in" id="dialog"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; padding-left: 17px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                <h3 class="modal-title">Détails du paiement</h3>
            </div>
            <div class="modal-body form-bold-label">
                <div class="form-group">
                    <label>Type de paiement</label>
                    <select name="ctl00$ContentPlaceHolder$ddl_type" id="ContentPlaceHolder_ddl_type" class="selectList form-control">
                       <option value="-1">Paypal</option>
                       <option value="-2">Stripe</option>
                       <option value="0">Indéfini</option>
                       <option value="-10" style="display: none;">Balance du client </option>
                    </select>
                </div>
                  <div class="form-group">
                    <label>Compte bancaire</label>
                    <select name="ctl00$ContentPlaceHolder$ddl_bankaccount" id="ContentPlaceHolder_ddl_bankaccount" class="selectList form-control">
                        <option value="0"></option>
                        <option value="-1" style="display:none;">Balance du client </option>
                    </select>
                      <div id="ContentPlaceHolder_labelConciliationDetails" style="color:#ddd;text-align:left;width:100%;margin:10px 0;font-size: 10px;line-height: 1.3;"></div>                      
                </div>
                <div class="form-group">
                    <label>Entré par</label>
                    <p class="form-control-static" id="tdpayUser">goheyey163 goheyey163</p>
                </div>
                <div class="form-group">
                    <label>Facture</label>
                    <p class="form-control-static"><a id="tdpayFactNo" class="icon-after external" target="_blank" href="/app/factures/edit/?id=1210829">00002</a></p>

                </div>
                <div class="form-group">
                    <label>Nom du client</label>
                    <p class="form-control-static"><a id="tdpayClientNom" class="icon-after external" target="_blank" href="/app/clients/edit/?id=924146">farahi</a></p>

                </div>
                <div class="form-group">
                    <label>Date</label>
                    <p class="form-control-static">
                        <a id="ContentPlaceHolder_Labeldate" class="icon-after caret-down" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$Labeldate','')">27 janvier 2023</a>
                        <input name="ctl00$ContentPlaceHolder$inputdate" type="text" id="ContentPlaceHolder_inputdate" style="display: none;">
                        <input name="ctl00$ContentPlaceHolder$paiementid" type="text" id="ContentPlaceHolder_paiementid" style="display: none;">
                    </p>
                        <div id="divpopupcalendar" style="position: absolute; display: none; margin-top: 0px; margin-left: -20px; z-index: 999;">
                        <div id="ctl00_ContentPlaceHolder_RadCalendar1_wrapper">
                  <table id="ctl00_ContentPlaceHolder_RadCalendar1" class="RadCalendar RadCalendar_Bootstrap" cellspacing="0">
    <caption>
        <span style="display:none;">Calendar</span>
    </caption><thead>
        <tr>
            <td class="rcTitlebar rcNoNav"><table cellspacing="0">
                <caption>
                    <span style="display:none;">Title and navigation</span>
                </caption><thead>
                    <tr style="display:none;">
                        <th scope="col">Title and navigation</th>
                    </tr>
                </thead><tbody>
<tr>
    <td><a id="ctl00_ContentPlaceHolder_RadCalendar1_FNP" class="t-button rcFastPrev" title="<<" href="#">&lt;&lt;</a></td><td><a id="ctl00_ContentPlaceHolder_RadCalendar1_NP" class="t-button rcPrev" title="<" href="#">&lt;</a></td><td id="ctl00_ContentPlaceHolder_RadCalendar1_Title" class="rcTitle">janvier, 2023</td><td><a id="ctl00_ContentPlaceHolder_RadCalendar1_NN" class="t-button rcNext" title=">" href="#">&gt;</a></td><td><a id="ctl00_ContentPlaceHolder_RadCalendar1_FNN" class="t-button rcFastNext" title=">>" href="#">&lt;&lt;</a></td>
</tr>
</tbody>
            </table></td>
        </tr>
    </thead><tbody>
<tr>
    <td class="rcMain"><table id="ctl00_ContentPlaceHolder_RadCalendar1_Top" class="rcMainTable" cellspacing="0">
<caption>
    <span style="display:none;">janvier, 2023</span>
</caption><thead>
    <tr class="rcWeek">
        <th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_0" title="dimanche" scope="col">dim.</th><th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_1" title="lundi" scope="col">lun.</th><th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_2" title="mardi" scope="col">mar.</th><th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_3" title="mercredi" scope="col">mer.</th><th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_4" title="jeudi" scope="col">jeu.</th><th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_5" title="vendredi" scope="col">ven.</th><th id="ctl00_ContentPlaceHolder_RadCalendar1_Top_cs_6" title="samedi" scope="col">sam.</th>
    </tr>
</thead><tbody>
    <tr class="rcRow">
        <td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td>
    </tr><tr class="rcRow">
        <td class="rcWeekend" title="dimanche, janvier 01, 2023"><a href="#">1</a></td><td title="lundi, janvier 02, 2023"><a href="#">2</a></td><td title="mardi, janvier 03, 2023"><a href="#">3</a></td><td title="mercredi, janvier 04, 2023"><a href="#">4</a></td><td title="jeudi, janvier 05, 2023"><a href="#">5</a></td><td title="vendredi, janvier 06, 2023"><a href="#">6</a></td><td class="rcWeekend" title="samedi, janvier 07, 2023"><a href="#">7</a></td>
    </tr><tr class="rcRow">
        <td class="rcWeekend" title="dimanche, janvier 08, 2023"><a href="#">8</a></td><td title="lundi, janvier 09, 2023"><a href="#">9</a></td><td title="mardi, janvier 10, 2023"><a href="#">10</a></td><td title="mercredi, janvier 11, 2023"><a href="#">11</a></td><td title="jeudi, janvier 12, 2023"><a href="#">12</a></td><td title="vendredi, janvier 13, 2023"><a href="#">13</a></td><td class="rcWeekend" title="samedi, janvier 14, 2023"><a href="#">14</a></td>
    </tr><tr class="rcRow">
        <td class="rcWeekend" title="dimanche, janvier 15, 2023"><a href="#">15</a></td><td title="lundi, janvier 16, 2023"><a href="#">16</a></td><td title="mardi, janvier 17, 2023"><a href="#">17</a></td><td title="mercredi, janvier 18, 2023"><a href="#">18</a></td><td title="jeudi, janvier 19, 2023"><a href="#">19</a></td><td title="vendredi, janvier 20, 2023"><a href="#">20</a></td><td class="rcWeekend" title="samedi, janvier 21, 2023"><a href="#">21</a></td>
    </tr><tr class="rcRow">
        <td class="rcWeekend" title="dimanche, janvier 22, 2023"><a href="#">22</a></td><td title="lundi, janvier 23, 2023"><a href="#">23</a></td><td title="mardi, janvier 24, 2023"><a href="#">24</a></td><td title="mercredi, janvier 25, 2023"><a href="#">25</a></td><td title="jeudi, janvier 26, 2023"><a href="#">26</a></td><td title="vendredi, janvier 27, 2023" class="rcSelected" style=""><a href="#">27</a></td><td class="rcWeekend" title="samedi, janvier 28, 2023"><a href="#">28</a></td>
    </tr><tr class="rcRow">
        <td class="rcWeekend" title="dimanche, janvier 29, 2023"><a href="#">29</a></td><td title="lundi, janvier 30, 2023"><a href="#">30</a></td><td title="mardi, janvier 31, 2023"><a href="#">31</a></td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td><td class="rcOtherMonth" style="height:0px;">&nbsp;</td>
    </tr>
</tbody>
</table></td>
</tr>
</tbody>
</table><input type="hidden" name="ctl00_ContentPlaceHolder_RadCalendar1_SD" id="ctl00_ContentPlaceHolder_RadCalendar1_SD" value="[[2023,1,27]]"><input type="hidden" name="ctl00_ContentPlaceHolder_RadCalendar1_AD" id="ctl00_ContentPlaceHolder_RadCalendar1_AD" value="[[1980,1,1],[2099,12,30],[2023,1,28]]">
</div>
                        </div>
                    <p></p>

                </div>
                <div class="form-group">
                    <label>Montant</label>
                    <p class="form-control-static" id="tdpayAmount">22,00 MAD</p>

                </div>
                <div class="form-group">
                    <label>Solde de la facture</label>
                    <p class="form-control-static" id="tdpaySolde">0,00 MAD</p>

                </div>
                <div class="form-group">
                    <label>Notes</label>

                    <textarea name="ctl00$ContentPlaceHolder$payDesc" rows="15" cols="20" id="ContentPlaceHolder_payDesc" class="form-control" style="height:100px;width: 100%; max-height: 100px"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a id="ContentPlaceHolder_LinkButtonsave" class="btn btn-default icon save" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$LinkButtonsave','')">Enregistrer</a>
                <a id="ContentPlaceHolder_LinkButtondelete" class="btn btn-link icon cancel" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$LinkButtondelete','')">Annuler</a>

            </div>
        </div>
    </div>
</div>