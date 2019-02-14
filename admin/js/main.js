$(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
  });

  $('.users-table').Tabledit({
    url: 'tableedit.php',
    editmethod: 'post',
    deletemethod: 'post',
    restoreButton: false,
    columns: {
      identifier: [0, 'id'],
      editable: [
        [1, 'Imie'],
        [2, 'Nazwisko'],
        [3, 'Email'],
        [4, 'Opis'],
        [5, 'Stanowisko', 'select', '{"Tester": "Tester", "Developer": "Developer", "Project Manager": "Project Manager"}'],
        //TODO: dorobić plik php który generuje JSON z wszystkimi stanowiskami aby nie trzeba było modyfikować kodu w PHP oraz w JS
        [6, 'Hidden Q1'],
        [7, 'Hidden Q2'],
        [8, 'Hidden Q3', 'select', '{"Tak": "Tak", "Nie": "Nie"}']
      ]
    },
    buttons: {
      edit: {
        class: 'btn btn-sm btn-default',
        html: '<i class="fas fa-pencil-alt"></i>',
        action: 'edit'
      },
      delete: {
        class: 'btn btn-sm btn-default',
        html: '<i class="fas fa-trash-alt"></i>',
        action: 'delete'
      },
      save: {
        class: 'btn btn-sm btn-success',
        html: '<i class="far fa-save"></i>'
      },
      restore: {
        class: 'btn btn-sm btn-warning',
        html: 'Restore',
        action: 'restore'
      },
      confirm: {
        class: 'btn btn-sm btn-danger',
        html: 'Confirm'
      }
    },
    onSuccess: function (data, textStatus, jqXHR) {
      location.reload();
    },
    onFail: function (jqXHR, textStatus, errorThrown) {
      alert("Błąd połączenia");
      location.reload();
    },
  });
});