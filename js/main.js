$(document).ready(function () {
    $('#add').on('click', openAddModal);

    $('.modal-background').on('click', function () {

    })



})


function openAddModal() {

    $('.modal-background').css('display', 'block');
    

}

function openEditModal(target_id){
    var target_contain = $('#'+target_id)[0].getElementsByTagName('td');
    $('.modal-background').css('display', 'block');
 
}





function RemoveEntry(event) {
    var target = event.target;
    var target_id = $(target).closest('tr')[0].id;
    var url = window.location.href.includes("Dashboard") ? window.location.href + "/Remove" : "/Dashboard/Remove";
   
}

function EditEntry(event) {
    var target_id = $(event.target).closest('tr')[0].id;
    openEditModal(target_id);

}