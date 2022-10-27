let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let BeneficioTable = $('#page_table_beneficio').DataTable({
    serverSide: true,
    ajax: `${root}/beneficios/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1"},
        { data: "content_2"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let empresaTable = $('#page_table_empresa').DataTable({
    serverSide: true,
    ajax: `${root}/empresa/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1"},
        { data: "content_2"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
}

function BeneficioData(content)
{
    let form = document.getElementById('form-update-beneficio')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
    CKEDITOR.instances['update_content_2'].setData(content.content_2)
}

function empresaData(content)
{
    console.log("prueba prueba");
    let form = document.getElementById('form-update-empresa')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
    CKEDITOR.instances['update_content_22'].setData(content.content_2)
}
 
async function findContent2(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                BeneficioData(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

async function findContent3(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                empresaData(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}