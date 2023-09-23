<script>
    function printPDF() {
        // Buat objek jsPDF
        const pdf = new jsPDF();

        // Fungsi untuk menambahkan halaman PDF
        function addPage() {
            pdf.addPage();
        }

        // Kode AJAX untuk mengambil konten grafik dari halaman home.blade.php
        $.ajax({
            url: "{{ route('home') }}?print=true",
            type: "GET",
            success: function (data) {
                // Setel konten yang akan dicetak
                const $chartContainer = $(data).find('#highchart');
                const chartHtml = $chartContainer.html();

                // Tambahkan halaman pertama
                pdf.html(chartHtml, {
                    callback: addPage
                });

                // Simpan sebagai file PDF
                pdf.save("laporan.pdf");
            }
        });
    }
</script>
