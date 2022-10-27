let root2 = document.querySelector('meta[name="url2"]')

if(root2)
    root2 = root2.getAttribute('content')

let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1" },
        { data: "content_2" },
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let Caracteristicastable = $('#page_table_caracteristicas').DataTable({
    serverSide: true,
    ajax : {
        'url'  : `${root}/caracteristicas/get-list`,
        'data' : { 'element' : $('#content_id').val() },
        'type' : 'get'
    },
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1" },
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
    form.querySelector('input[name="content_1"]').value = content.content_1
}

function variableDestroy(id)
{
    Swal.fire({
        title: 'Deseas eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            elementDestroy(id)
        }
      })
}

function variableDestroy(id)
{
    axios.delete(`${root2}/${id}`).then(r => {
        Swal.fire(
            'Eliminado!',
            '',
            'success'
        )

        if(typeof Caracteristicastable !== 'undefined')
            Caracteristicastable.ajax.reload()
        
    }).catch(error => console.error(error))
}

async function findCaracteristica(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataSliderContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

