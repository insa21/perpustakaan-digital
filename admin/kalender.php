<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Calendar with Database Interaction</title>
    <!-- Tambahkan stylesheet FullCalendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>

<body>

    <!-- Kalender -->
    <div id="calendar"></div>

    <!-- Modal - Tambah Event Baru -->
    <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
            <div class="modal-content">
                <!-- Isi Modal -->
                <div class="modal-body">
                    <form class="new-event--form">
                        <div class="form-group">
                            <!-- Elemen input tersembunyi untuk menyimpan ID tanggal -->
                            <input type="hidden" class="new-event--date-id" />
                            <label class="form-control-label">Event title</label>
                            <input type="text" class="form-control form-control-alternative new-event--title" placeholder="Event Title">
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-control-label d-block mb-3">Status color</label>
                            <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                                <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" autocomplete="off" checked></label>
                                <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning" autocomplete="off"></label>
                                <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger" autocomplete="off"></label>
                                <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success" autocomplete="off"></label>
                                <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default" autocomplete="off"></label>
                                <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary" autocomplete="off"></label>
                            </div>
                        </div>
                        <input type="hidden" class="new-event--start" />
                        <input type="hidden" class="new-event--end" />
                    </form>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary new-event--add">Tambahkan event</button>
                    <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Skrip FullCalendar -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <!-- Skrip Kustom -->
    <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // Konfigurasi FullCalendar lainnya di sini

                dateClick: function(info) {
                    // Tangkap tanggal yang diklik
                    var clickedDate = info.date;

                    // Kirim tanggal ke backend atau simpan langsung ke database
                    $.ajax({
                        url: 'backend.php', // Ganti dengan URL backend Anda
                        type: 'POST',
                        data: {
                            date: clickedDate.format(), // Format tanggal sesuai kebutuhan Anda
                        },
                        success: function(response) {
                            // Handle respons dari backend
                            console.log(response);
                            // Tampilkan modal atau pesan sukses jika diperlukan
                            $('#new-event').modal('show');
                            $('.new-event--date-id').val(clickedDate.format());
                            $('.new-event--start').val(clickedDate.format());
                            $('.new-event--end').val(clickedDate.format());
                        },
                        error: function(error) {
                            // Handle kesalahan
                            console.error(error);
                        }
                    });
                },
            });

            calendar.render();
        });
    </script>

</body>

</html>