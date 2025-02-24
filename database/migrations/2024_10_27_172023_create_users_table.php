    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration
    {
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username', 191)->unique(); // 191 belgilangan
                $table->string('password');
                $table->timestamps(); // created_at va updated_at ustunlarini qo'shadi
            });
        }
        

        public function down()
        {
            Schema::dropIfExists('users'); // Jadvalni o'chirish
        }
    }
