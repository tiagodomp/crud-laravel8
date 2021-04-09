$(document).ready(function(){
    if($('#crudModal').length > 0) {
        crudModal($('#crudModal'));
    }

    if($('#cpf').length > 0) {
        $('#cpf').mask('000.000.000-00');
    }
});


const crudModal = (crudModal) => {

    const url = window.location.hostname;
    var form = crudModal.find('form');

    const eraseValuesForm = () => {
        form.find('input').map((key, input)=>{
            $(input).val('').removeAttr('disabled');
        });
    }

    const setValueForm = (entity, disable = false) => {
        eraseValuesForm();
        form.find('input').map((key, input)=>{
            var inp = $(input);
            if(entity[inp.attr('name')].length > 0) {
                inp.val(entity[inp.attr('name')]);
            }

            if(disable) {
                inp.attr('disabled', true);
            }
        });
    }

    const formCreate = (model) => {
        eraseValuesForm();
        form.attr('method', 'POST');
        form.attr('action', "/"+model);
        form.find('#send').text('Save').attr('class','btn btn-success');
    }

    const formShow = (model, entity) => {
        form.attr('method', 'GET');
        form.attr('action', "/"+model+"/"+entity.id);
        form.find('#send').attr('class','d-none');
    }

    const formEdit = (model, entity) => {
        form.attr('method', 'PUT');
        form.attr('action', "/"+model+"/"+entity.id);
        form.find('#send').text('Update').attr('class','btn btn-primary');
    }

    const formDestroy = (model, entity) => {
        form.attr('method', 'DELETE');
        form.attr('action', "/"+model+"/"+entity.id);
        form.find('#send').text('Delete').attr('class','btn btn-danger');
    }

    const setForm = (button) => {
        const model = button.data("model");
        const action = button.data("action");
        const entity = action != 'create'?JSON.parse(button.data("entity").replace(/&quot;/g,'"')):{};

        crudModal.find('.modal-title').text("Crud: "+ action + " " + model);

        switch(action) {
            case 'create':
                formCreate(model);
                break;
            case 'show':
                formShow(model, entity);
                setValueForm(entity, true);
                break;
            case 'edit':
                formEdit(model, entity);
                setValueForm(entity);
                break;
            case 'destroy':
                formDestroy(model, entity);
                setValueForm(entity, true);
                break;
        }
    }

    crudModal.bind('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);
        setForm(button);
    })
}


