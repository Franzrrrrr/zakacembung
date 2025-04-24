    <?php

    use App\Models\Genre;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('penulis')->unique();
            $table->string('cover_path')->nullable();
            $table->unsignedBigInteger('genre_id'); // Ganti dengan tipe data yang sesuai dengan kolom id di genres
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->text('deskripsi');
            $table->enum('status', ['belum_dibaca', 'sedang_dibaca', 'selesai_dibaca'])->default('belum_dibaca');
            $table->integer('total_pages')->default(100);
            $table->integer('last_read_page')->default(10);
            $table->timestamps();
        });
    }


        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('books');
        }
    };
