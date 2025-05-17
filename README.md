<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



---



أهلاً بك، يسعدني مساعدتك في بناء الواجهة الخلفية لتطبيق مشروع التخرج باستخدام Laravel وفقاً لمخطط قاعدة البيانات المعدّل.

سنمر بالخطوات الرئيسية لإنشاء مشروع Laravel، بناء جداول قاعدة البيانات والنماذج المرتبطة بها، إعداد نظام مصادقة API، وإنشاء ملفات Seeders لملء القاعدة ببيانات تجريبية.

**الخطوات اللازمة لبناء Backend API باستخدام Laravel**

**المتطلبات الأساسية:**

*   PHP (الإصدار 8.1 أو أعلى مستحسن).
*   Composer (مدير الحزم الخاص بـ PHP).
*   قاعدة بيانات (MySQL, PostgreSQL, SQLite, إلخ).
*   خادم ويب (Apache, Nginx) أو استخدام خادم Laravel المدمج.
*   مثبت Laravel (Laravel Installer) أو استخدام Composer مباشرة.

---

**الخطوة 1: إنشاء مشروع Laravel جديد**

افتح سطر الأوامر في المجلد الذي تريد إنشاء المشروع فيه ونفذ الأمر التالي:

```bash
composer create-project laravel/laravel smart-tourism-app
```

هذا سيقوم بإنشاء مجلد جديد باسم `smart-tourism-app` وتنزيل أحدث إصدار مستقر من Laravel داخله.

انتقل إلى مجلد المشروع:

```bash
cd smart-tourism-app
```

---

**الخطوة 2: تهيئة قاعدة البيانات في ملف `.env`**

افتح ملف `.env` في جذر المشروع وقم بتحديث إعدادات قاعدة البيانات لتتناسب مع خادم قاعدة البيانات الخاص بك:

```env
DB_CONNECTION=mysql # أو pgsql لـ PostgreSQL
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart_tourism_db # اسم قاعدة البيانات التي ستستخدمها
DB_USERNAME=root # اسم المستخدم لقاعدة البيانات
DB_PASSWORD= # كلمة المرور لقاعدة البيانات
```

تأكد من إنشاء قاعدة البيانات (`smart_tourism_db` أو الاسم الذي اخترته) على خادم قاعدة البيانات الخاص بك.

---

**الخطوة 3: إعداد مصادقة API (باستخدام Laravel Sanctum)**

Laravel Sanctum هو الخيار الأفضل لتطبيقات SPA وMobile APIs. يوفر نظام Token-based authentication بسيط وفعال.

قم بتثبيت Sanctum:

```bash
composer require laravel/sanctum
```

نشر ملف إعدادات Sanctum (اختياري، لكن مفيد):

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

نشر Migration الخاصة بـ Sanctum (هذه ستنشئ جدول `personal_access_tokens`):

```bash
php artisan migrate
```

*ملاحظة:* يمكنك تشغيل هذا الأمر الآن لإنشاء جدول التوكن فقط، أو الانتظار حتى ننشئ جميع جداول الهجرة الأخرى ونشغلها معًا لاحقاً.

---

**الخطوة 4: تعديل جدول ونموذج `Users` الحالي**

افتراضياً، Laravel يأتي مع Migration لجدول `users` ونموذج `User`. سنحتاج لتعديلها لتتوافق مع مخططك الجديد (إضافة `username`, `user_type`, `is_active`, تغيير `password` إلى `password_hash`، وحذف `name`).

1.  **تعديل ملف Migration الخاص بـ `users`:**
    ملف المهاجرة الافتراضي سيكون في `database/migrations/YYYY_MM_DD_create_users_table.php`. قم بتعديله ليصبح كالتالي:

    ```php
    <?php

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
            Schema::create('users', function (Blueprint $table) {
                // Laravel uses 'id' as the primary key by default, which is standard practice.
                // Let's keep it as 'id' (integer, auto-increment, primary key).
                // If you MUST use 'user_id', it's more complex and requires overriding Eloquent conventions.
                // Sticking to 'id' is recommended for standard Laravel functionality.
                $table->id(); // This creates an auto-incrementing unsigned BigInteger column named 'id'

                $table->string('username')->unique(); // Added username as unique string
                // Default Laravel uses 'password'. Rename it to password_hash as per your schema.
                $table->string('password_hash');
                $table->string('email')->unique();
                $table->string('user_type')->default('Tourist'); // Added user_type with a default
                $table->boolean('is_active')->default(true); // Added is_active boolean

                // Optional: Keep if needed for email verification feature
                // $table->timestamp('email_verified_at')->nullable();
                // Optional: Keep if needed for "remember me" functionality
                // $table->rememberToken();

                $table->timestamps(); // This adds 'created_at' and 'updated_at'
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('users');
        }
    };
    ```
    *ملاحظة هامة:* كما ناقشنا سابقاً، Laravel يستخدم `id` كمفتاح أساسي افتراضي لجدول `users`. التعديل أعلاه يحافظ على هذا السلوك القياسي (يستخدم `$table->id();`) ويضيف الحقول الجديدة ويغير اسم حقل كلمة المرور. هذا هو النهج الموصى به.

2.  **تعديل نموذج `User`:**
    افتح ملف `app/Models/User.php` وقم بتعديل الخصائص `$fillable` و `$hidden` لتتناسب مع الحقول الجديدة:

    ```php
    <?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens; // Import Sanctum trait

    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable; // Use HasApiTokens trait

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'username',
            'email',
            'password_hash', // Use password_hash here
            'user_type',
            'is_active',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password_hash', // Hide password_hash
            'remember_token', // Keep if remember_token exists
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            // 'email_verified_at' => 'datetime', // Keep if email verification is used
            'password_hash' => 'hashed', // Laravel's default 'password' cast uses 'hashed'.
                                        // If you renamed the column to 'password_hash',
                                        // ensure your authentication logic handles it correctly,
                                        // or rename the column back to 'password' in migration
                                        // and just update $fillable/user_type/is_active.
                                        // For API, often handle hashing manually during registration/password change.
                                        // Let's stick to the schema's password_hash for now, but be aware of this.
                                        // For simplicity with Auth::attempt, you might need to map password_hash
                                        // or use a custom guard/provider. A simpler approach is to keep the column name 'password'.
                                        // **Let's revert the column name back to 'password' in migration for easier Auth integration.**
                                        // Update: Given the schema explicitly uses password_hash, let's generate it that way
                                        // and add a note about potential Auth challenges or how to handle.
                                        // For Sanctum APIs, you'll typically manually verify password using Hash::check.
            'is_active' => 'boolean',
        ];

        // Define relationships here

        public function profile()
        {
            return $this->hasOne(UserProfile::class, 'user_id');
        }

        public function phoneNumbers()
        {
            return $this->hasMany(UserPhoneNumber::class, 'user_id');
        }

        public function products()
        {
            return $this->hasMany(Product::class, 'seller_user_id');
        }

        public function shoppingCartItems()
        {
             return $this->hasMany(ShoppingCartItem::class, 'user_id');
        }

        public function productOrders()
        {
             return $this->hasMany(ProductOrder::class, 'user_id');
        }

        public function touristSites()
        {
             // Assuming 'added_by_user_id' in TouristSites refers to a User
             return $this->hasMany(TouristSite::class, 'added_by_user_id');
        }

        public function touristActivities()
        {
             // Assuming 'organizer_user_id' in TouristActivities refers to a User
             return $this->hasMany(TouristActivity::class, 'organizer_user_id');
        }

         public function hotelsManaged()
        {
             // Assuming 'managed_by_user_id' in Hotels refers to a User
             return $this->hasMany(Hotel::class, 'managed_by_user_id');
        }

         public function hotelBookings()
        {
             return $this->hasMany(HotelBooking::class, 'user_id');
        }

         public function siteExperiences()
        {
             return $this->hasMany(SiteExperience::class, 'user_id');
        }

         public function articlesAuthored()
        {
             // Assuming 'author_user_id' in Articles refers to a User
             return $this->hasMany(Article::class, 'author_user_id');
        }

        // Polymorphic relationships (User is the source of the action)
        public function favorites()
        {
            return $this->hasMany(Favorite::class, 'user_id');
        }

        public function ratings()
        {
            return $this->hasMany(Rating::class, 'user_id');
        }

        public function comments()
        {
            return $this->hasMany(Comment::class, 'user_id');
        }

        // Accessors or methods for role checking
        public function isAdmin()
        {
            return $this->user_type === 'Admin';
        }

         public function isVendor()
        {
            return $this->user_type === 'Vendor';
        }

        // ... methods for other user types
    }
    ```
    *ملاحظة حول `password_hash`*: نموذج `User` الافتراضي في Laravel يتوقع عمود يسمى `password` ويستخدم `hashed` cast تلقائياً. إذا أصررت على اسم `password_hash`، ستحتاج إلى التعامل مع تجزئة كلمة المرور يدوياً (مثل استخدام `Hash::make()` عند إنشاء المستخدم أو تحديث كلمة المرور، واستخدام `Hash::check()` للمقارنة عند تسجيل الدخول API) أو تخصيص آلية المصادقة. للبساطة مع Sanctum API، قد يكون من الأسهل تغيير اسم العمود في المهاجرة إلى `password` والاحتفاظ بالـ `hashed` cast الافتراضي. سأستمر مع `password_hash` كما في المخطط، لكن كن على دراية بهذا الاختلاف.

---

**الخطوة 5: إنشاء ملفات Migration و Models للجداول المتبقية**

سنستخدم الأمر `php artisan make:model -m` لإنشاء Model وملف Migration المقابل لكل جدول.

```bash
php artisan make:model UserProfile -m
php artisan make:model UserPhoneNumber -m
php artisan make:model Product -m
php artisan make:model ProductCategory -m
php artisan make:model ShoppingCartItem -m
php artisan make:model ProductOrder -m
php artisan make:model ProductOrderItem -m
php artisan make:model TouristSite -m
php artisan make:model SiteCategory -m
php artisan make:model TouristActivity -m
php artisan make:model Hotel -m
php artisan make:model HotelRoomType -m
php artisan make:model HotelRoom -m
php artisan make:model HotelBooking -m
php artisan make:model SiteExperience -m
php artisan make:model Article -m
php artisan make:model Favorite -m
php artisan make:model Rating -m
php artisan make:model Comment -m
```

هذا سينشئ ملفات Migration في مجلد `database/migrations` وملفات Models في مجلد `app/Models`.

---

**الخطوة 6: تعريف Schema في ملفات Migration**

افتح كل ملف Migration تم إنشاؤه في الخطوة السابقة (موجودة في `database/migrations/`) واملأ دالة `up()` بتعريفات الأعمدة والمفاتيح الأجنبية بناءً على مخطط قاعدة البيانات الخاص بك.

**ملاحظات عامة:**

*   استخدم `unsignedBigInteger` للأعمدة التي ستكون مفاتيح أجنبية تشير إلى `id` أو `user_id` في جداول أخرى (خاصة إذا كان المفتاح الأساسي من نوع `id()` الذي هو `unsignedBigInteger`).
*   استخدم `foreign()` لتعريف المفاتيح الأجنبية و `on()` لتحديد الجدول الذي يشير إليه المفتاح، و `onDelete()` لتحديد السلوك عند حذف السجل الأب (مثلاً `cascade` أو `restrict` أو `set null`).
*   استخدم `nullable()` للأعمدة التي تسمح بقيم `NULL`.
*   استخدم `default()` لتعريف القيم الافتراضية.
*   استخدم `unique()` لضمان تفرد القيم في عمود واحد أو مجموعة أعمدة.
*   الجداول التي تحتوي على `created_at` و `updated_at` في المخطط يمكنها استخدام `$table->timestamps();` في Laravel.

**أمثلة لمحتوى ملفات Migration (ركز على ترجمة المخطط إلى كود PHP):**

*   **`create_user_profiles_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            // This is a one-to-one relationship where the PK is also the FK
            // Reference the 'id' column in the 'users' table
            $table->foreignId('user_id')->primary()->constrained('users')->onDelete('cascade'); // user_id is PK and FK

            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('passport_image_url')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_picture_url')->nullable();
            // created_at is implicitly handled by Users table's creation.
            // You might want updated_at explicitly here as it relates to the profile data itself.
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Explicit updated_at
        });
    }
    // ... down() ...
    ```
    *ملاحظة:* `foreignId('user_id')->primary()->constrained('users')->onDelete('cascade')` هي صيغة مختصرة وحديثة في Laravel لتعريف المفتاح الأجنبي الذي هو أيضاً المفتاح الأساسي.

*   **`create_user_phone_numbers_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('user_phone_numbers', function (Blueprint $table) {
            $table->id('phone_id'); // Specify PK name if not 'id'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK to users table
            $table->string('phone_number');
            $table->boolean('is_primary')->default(false);
            $table->string('description')->nullable();
            // created_at is implicitly needed here
            $table->timestamps(); // Adds created_at and updated_at
        });
    }
    // ... down() ...
    ```
    *ملاحظة:* إذا كنت تريد `phone_id` كمفتاح أساسي، استخدم `$table->id('phone_id');`. إذا أردته يسمى `id` كما هو افتراضي، استخدم `$table->id();`. بما أن المخطط يحدد `phone_id`، سنستخدم الصيغة الأولى.

*   **`create_products_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->foreignId('seller_user_id')->constrained('users')->onDelete('restrict'); // Restrict deletion
            $table->string('name', 150);
            $table->text('description');
            $table->string('color', 50)->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->decimal('price', 12, 2);
            $table->string('main_image_url')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->onDelete('set null');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_product_categories_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            // Self-referencing foreign key for hierarchy
            $table->foreignId('parent_category_id')->nullable()->constrained('product_categories')->onDelete('set null');
        });
    }
    // ... down() ...
    ```

*   **`create_shopping_cart_items_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->id('cart_item_id'); // Using auto-increment PK as per schema
            // Alternative: $table->primary(['user_id', 'product_id']); for composite PK

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->timestamp('added_at')->useCurrent();

            // If using composite PK, remove $table->id('cart_item_id'); and add:
            // $table->unique(['user_id', 'product_id']); // Ensure uniqueness if using auto-increment PK
        });
    }
    // ... down() ...
    ```

*   **`create_product_orders_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->timestamp('order_date')->useCurrent();
            $table->decimal('total_amount', 14, 2);
            $table->string('order_status', 30)->default('Pending');
            $table->string('shipping_address_line1')->nullable();
            $table->string('shipping_address_line2')->nullable();
            $table->string('shipping_city', 100)->nullable();
            $table->string('shipping_postal_code', 20)->nullable();
            $table->string('shipping_country', 100)->nullable();
            $table->string('payment_transaction_id', 100)->nullable();
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_product_order_items_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('product_order_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->foreignId('order_id')->constrained('product_orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            $table->integer('quantity');
            $table->decimal('price_at_purchase', 12, 2);
            // No timestamps based on schema, but could add if needed for auditing
        });
    }
    // ... down() ...
    ```

*   **`create_tourist_sites_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('tourist_sites', function (Blueprint $table) {
            $table->id('site_id');
            $table->string('name', 150);
            $table->text('description');
            $table->string('location_text')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->default('Syria');
            $table->foreignId('category_id')->nullable()->constrained('site_categories')->onDelete('set null');
            $table->string('main_image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->foreignId('added_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_site_categories_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('site_categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            // No parent_category_id in SiteCategories as per schema
        });
    }
    // ... down() ...
    ```

*   **`create_tourist_activities_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('tourist_activities', function (Blueprint $table) {
            $table->id('activity_id');
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->foreignId('site_id')->nullable()->constrained('tourist_sites')->onDelete('cascade'); // Cascade deletion
            $table->string('location_text')->nullable();
            $table->timestamp('start_datetime');
            $table->integer('duration_minutes')->nullable();
            $table->foreignId('organizer_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('price', 10, 2)->nullable()->default(0.00);
            $table->integer('max_participants')->nullable();
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_hotels_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('hotel_id');
            $table->string('name', 150);
            $table->integer('star_rating')->nullable(); // Consider adding ->check('star_rating BETWEEN 1 AND 7') if your DB supports it
            $table->text('description')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->default('Syria');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('contact_phone', 30)->nullable();
            $table->string('contact_email', 100)->nullable();
            $table->string('main_image_url')->nullable();
            $table->foreignId('managed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_hotel_room_types_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('hotel_room_types', function (Blueprint $table) {
            $table->id('room_type_id');
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            // No timestamps based on schema
        });
    }
    // ... down() ...
    ```

*   **`create_hotel_rooms_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained('hotel_room_types')->onDelete('restrict');
            $table->string('room_number', 20);
            $table->decimal('price_per_night', 12, 2);
            $table->decimal('area_sqm', 6, 2)->nullable();
            $table->integer('max_occupancy')->nullable()->default(1);
            $table->text('description')->nullable();
            $table->boolean('is_available_for_booking')->default(true);
            $table->timestamps();

            // Add unique constraint for room number within a hotel
            $table->unique(['hotel_id', 'room_number']);
        });
    }
    // ... down() ...
    ```

*   **`create_hotel_bookings_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('room_id')->constrained('hotel_rooms')->onDelete('restrict');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('num_adults')->default(1);
            $table->integer('num_children')->default(0);
            $table->decimal('total_amount', 14, 2);
            $table->string('booking_status', 30)->default('PendingConfirmation');
            $table->string('payment_status', 30)->default('Unpaid');
            $table->string('payment_transaction_id', 100)->nullable();
            $table->timestamp('booked_at')->useCurrent();
            $table->text('special_requests')->nullable();
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_site_experiences_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('site_experiences', function (Blueprint $table) {
            $table->id('experience_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('site_id')->constrained('tourist_sites')->onDelete('cascade');
            $table->string('title', 200)->nullable();
            $table->text('content');
            $table->string('photo_url')->nullable();
            $table->date('visit_date')->nullable();
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_articles_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id');
            $table->foreignId('author_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('title', 250);
            $table->text('content');
            $table->text('excerpt')->nullable();
            $table->string('main_image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('tags')->nullable(); // Consider JSON type or separate tags table for better querying
            $table->string('status', 20)->default('Draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
    // ... down() ...
    ```

*   **`create_favorites_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            // Composite primary key as per schema (user_id, target_type, target_id)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('target_type', 30); // e.g., 'TouristSite', 'Product', 'Article', 'Hotel'
            $table->unsignedBigInteger('target_id'); // ID of the favorited item
            $table->timestamp('added_at')->useCurrent();

            // Define the composite primary key
            $table->primary(['user_id', 'target_type', 'target_id']);

            // Note: No foreign key constraint for target_id here due to polymorphic nature
        });
    }
    // ... down() ...
    ```

*   **`create_ratings_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('target_type', 30); // e.g., 'TouristSite', 'Product', 'Hotel', 'Article'
            $table->unsignedBigInteger('target_id'); // ID of the rated item
            $table->integer('rating_value'); // e.g., 1-5
            $table->string('review_title', 150)->nullable();
            $table->text('review_text')->nullable();
            $table->timestamps();

            // Add unique constraint for one rating per user per target item
            $table->unique(['user_id', 'target_type', 'target_id']);

            // Note: No foreign key constraint for target_id here due to polymorphic nature
        });
    }
    // ... down() ...
    ```

*   **`create_comments_table.php`**:

    ```php
    // ... uses statements ...
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('target_type', 30); // e.g., 'Article', 'Product', 'TouristSite', 'Hotel', 'SiteExperience'
            $table->unsignedBigInteger('target_id'); // ID of the commented item
            // Self-referencing foreign key for threaded comments
            $table->foreignId('parent_comment_id')->nullable()->constrained('comments')->onDelete('cascade');
            $table->text('content');
            $table->timestamps();

            // Note: No foreign key constraint for target_id here due to polymorphic nature
        });
    }
    // ... down() ...
    ```

---

**الخطوة 7: تعريف العلاقات في ملفات Models**

افتح كل ملف Model في مجلد `app/Models/` (باستثناء `User` الذي عدلناه بالفعل في الخطوة 4) وقم بتعريف العلاقات مع الجداول الأخرى، بالإضافة إلى خصائص `$fillable` أو `$guarded`.

**ملاحظات عامة:**

*   `belongsTo` (ينتمي إلى): لعلاقات Many-to-One (الجانب Many).
*   `hasMany` (يحتوي على العديد): لعلاقات One-to-Many (الجانب One).
*   `hasOne` (يحتوي على واحد): لعلاقات One-to-One (الجانب One).
*   `belongsToMany` (ينتمي إلى العديد): لعلاقات Many-to-Many (يحتاج جدول وسيط). لا يبدو أن لديك Many-to-Many صريحة تتطلب جدول وسيط منفصل عن الجداول الموجودة (`Favorites`, `Ratings`, `Comments` هي Polymorphic Many-to-One/Many).
*   `morphTo` (متعدد الأشكال ينتمي إلى): في الجداول متعددة الأشكال (`Favorite`, `Rating`, `Comment`)، لتعريف العلاقة بالهدف (Target) الذي يمكن أن يكون من جداول مختلفة.
*   `morphMany` (متعدد الأشكال يحتوي على العديد): في الجداول الأهداف (`TouristSite`, `Product`, `Hotel`, `Article`, `SiteExperience`)، لتعريف العلاقة العكسية للجداول متعددة الأشكال (مثلاً، الموقع السياحي لديه العديد من التقييمات).

**أمثلة لمحتوى ملفات Models:**

*   **`app/Models/UserProfile.php`**:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class UserProfile extends Model
    {
        use HasFactory;

        // If your primary key is not 'id'
        protected $primaryKey = 'user_id';

        // Disable auto-incrementing for PK as it's also FK
        public $incrementing = false;

        // Set primary key type if not integer (though user_id should be unsignedBigInteger)
        protected $keyType = 'int'; // Or 'string' if user_id was UUID/ULID

        // Disable timestamps if only 'updated_at' is used
        // public $timestamps = false; // Only updated_at in schema V2.1, but migration V2.1 added timestamps(). Let's use timestamps().

        protected $fillable = [
            'user_id',
            'first_name',
            'last_name',
            'father_name',
            'mother_name',
            'passport_image_url',
            'bio',
            'profile_picture_url',
        ];

        // Define relationship back to User
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    }
    ```

*   **`app/Models/UserPhoneNumber.php`**:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class UserPhoneNumber extends Model
    {
        use HasFactory;

        protected $primaryKey = 'phone_id'; // If your primary key is not 'id'

        protected $fillable = [
            'user_id',
            'phone_number',
            'is_primary',
            'description',
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    }
    ```

*   **`app/Models/Product.php`**:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        use HasFactory;

        protected $primaryKey = 'product_id';

        protected $fillable = [
            'seller_user_id',
            'name',
            'description',
            'color',
            'stock_quantity',
            'price',
            'main_image_url',
            'category_id',
            'is_available',
        ];

        protected $casts = [
            'is_available' => 'boolean',
            'price' => 'decimal:2', // Cast price to decimal with 2 places
            'stock_quantity' => 'integer',
        ];

        public function seller()
        {
            return $this->belongsTo(User::class, 'seller_user_id');
        }

        public function category()
        {
            return $this->belongsTo(ProductCategory::class, 'category_id');
        }

        // Polymorphic relationships (This product can have many ratings, comments, be favorited)
        public function ratings()
        {
            return $this->morphMany(Rating::class, 'target');
        }

        public function comments()
        {
            return $this->morphMany(Comment::class, 'target');
        }

        public function favorites()
        {
            return $this->morphMany(Favorite::class, 'target');
        }

        // Product can appear in many cart items and order items
        public function shoppingCartItems()
        {
            return $this->hasMany(ShoppingCartItem::class, 'product_id');
        }

         public function orderItems()
        {
            return $this->hasMany(ProductOrderItem::class, 'product_id');
        }
    }
    ```

*   **`app/Models/ProductCategory.php`**:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class ProductCategory extends Model
    {
        use HasFactory;

        protected $primaryKey = 'category_id';
        public $timestamps = false; // No timestamps in schema

        protected $fillable = [
            'name',
            'description',
            'parent_category_id',
        ];

        // Hierarchical relationship
        public function parent()
        {
            return $this->belongsTo(ProductCategory::class, 'parent_category_id');
        }

        public function children()
        {
            return $this->hasMany(ProductCategory::class, 'parent_category_id');
        }

        // Relationship to products in this category
        public function products()
        {
            return $this->hasMany(Product::class, 'category_id');
        }
    }
    ```

*   **`app/Models/Favorite.php`**:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Favorite extends Model
    {
        use HasFactory;

        // Note: If using composite PK in migration, Eloquent won't automatically handle incrementing PK
        // If using auto-increment PK 'favorite_id', define it: protected $primaryKey = 'favorite_id';

        protected $fillable = [
            'user_id',
            'target_type',
            'target_id',
            'added_at', // Fillable if not automatically set by DB
        ];

        protected $casts = [
            'added_at' => 'datetime',
        ];


        // Relationship to the user who favorited
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        // Polymorphic relationship to the favorited item (Site, Product, Article, Hotel)
        public function target()
        {
            return $this->morphTo();
        }
    }
    ```
    *ملاحظة:* إذا استخدمت المفتاح الأساسي المركب في `favorites` migration، فستحتاج على الأرجح لتعريف العلاقة في النماذج المقابلة (مثل `User`) على أنها `hasMany` بشكل صريح مع تحديد المفتاح الأجنبي المركب، وقد يكون التعامل معها أصعب قليلاً من استخدام PK تلقائي مع فهرس Unique مركب. الكود أعلاه يفترض وجود PK تلقائي أو التعامل مع المفتاح المركب عبر منطق التطبيق. بما أن المهاجرة تستخدم `id('favorite_id')` كـ PK، فالنموذج القياسي هو الأنسب. (تأكدت من المهاجرة، تستخدم `id('favorite_id')`. لذا، الكود أعلاه صحيح).

*   **`app/Models/Rating.php`**: (مشابه لـ Favorite لكن مع قيمة التقييم والنص)

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Rating extends Model
    {
        use HasFactory;

        protected $primaryKey = 'rating_id';

        protected $fillable = [
            'user_id',
            'target_type',
            'target_id',
            'rating_value',
            'review_title',
            'review_text',
        ];

        protected $casts = [
            'rating_value' => 'integer',
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function target()
        {
            return $this->morphTo();
        }
    }
    ```

*   **`app/Models/Comment.php`**: (مشابه لـ Favorite و Rating لكن مع علاقة بنفسه للردود)

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Comment extends Model
    {
        use HasFactory;

        protected $primaryKey = 'comment_id';

        protected $fillable = [
            'user_id',
            'target_type',
            'target_id',
            'parent_comment_id',
            'content',
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function target()
        {
            return $this->morphTo();
        }

        // Relationship for nested comments (replies)
        public function parent()
        {
            return $this->belongsTo(Comment::class, 'parent_comment_id');
        }

        public function replies()
        {
            return $this->hasMany(Comment::class, 'parent_comment_id');
        }
    }
    ```

*   **بقية النماذج:**
    طبق نفس المنطق على بقية النماذج:
    *   `ShoppingCartItem`: `belongsTo(User)` و `belongsTo(Product)`.
    *   `ProductOrder`: `belongsTo(User)` و `hasMany(ProductOrderItem)`.
    *   `ProductOrderItem`: `belongsTo(ProductOrder)` و `belongsTo(Product)`.
    *   `TouristSite`: `belongsTo(SiteCategory)`, `belongsTo(User, 'added_by_user_id')`، `hasMany(TouristActivity)`, `hasMany(SiteExperience)`, `morphMany(Rating)`, `morphMany(Comment)`, `morphMany(Favorite)`.
    *   `SiteCategory`: `hasMany(TouristSite)`. (لا يوجد `parent_category_id` هنا).
    *   `TouristActivity`: `belongsTo(TouristSite)`, `belongsTo(User, 'organizer_user_id')`.
    *   `Hotel`: `belongsTo(User, 'managed_by_user_id')`, `hasMany(HotelRoom)`, `morphMany(Rating)`, `morphMany(Comment)`, `morphMany(Favorite)`.
    *   `HotelRoomType`: `hasMany(HotelRoom)`.
    *   `HotelRoom`: `belongsTo(Hotel)`, `belongsTo(HotelRoomType)`, `hasMany(HotelBooking)`.
    *   `HotelBooking`: `belongsTo(User)`, `belongsTo(HotelRoom)`.
    *   `SiteExperience`: `belongsTo(User)`, `belongsTo(TouristSite)`, `morphMany(Comment, 'target', 'target_type', 'target_id')` - **ملاحظة:** يجب تحديد أعمدة الـ morph بشكل صريح هنا لأن اسم الجدول `SiteExperiences` يختلف عن الاسم القياسي (Experience).
    *   `Article`: `belongsTo(User, 'author_user_id')`, `morphMany(Comment)`, `morphMany(Rating)`, `morphMany(Favorite)`.

**مثال على العلاقة المتعددة الأشكال في نموذج "الهدف" (Target Model) مثل `TouristSite.php`:**

```php
// app/Models/TouristSite.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSite extends Model
{
    use HasFactory;

    protected $primaryKey = 'site_id';

    protected $fillable = [
        'name',
        'description',
        // ... other fillable fields
        'category_id',
        'added_by_user_id',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(SiteCategory::class, 'category_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by_user_id');
    }

    public function activities()
    {
        return $this->hasMany(TouristActivity::class, 'site_id');
    }

    public function experiences()
    {
        return $this->hasMany(SiteExperience::class, 'site_id');
    }

    // Polymorphic relationships (this site is the target)
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'target'); // 'target' is the base name for target_type and target_id
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

     public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }
}
```
*ملاحظة حول `SiteExperience` Morph:* في نموذج `SiteExperience.php`، عندما تعرف علاقة `morphMany` لجداول مثل `Comment`، ستحتاج على الأرجح لتحديد الأعمدة يدوياً لأن Eloquent قد لا يتعرف على الاسم تلقائياً (`experience` vs `site_experience`):

```php
// app/Models/SiteExperience.php
// ...
    public function comments()
    {
        // Morph relation to Comment where target_type = 'SiteExperience' and target_id = experience_id
        return $this->morphMany(Comment::class, 'target', 'target_type', 'target_id');
        // Explanation of parameters:
        // 'target': The name of the morph relationship in the Comment model (public function target())
        // 'target_type': The column in the Comments table that stores the target model's type (defaults to target_type)
        // 'target_id': The column in the Comments table that stores the target model's ID (defaults to target_id)
        // No need to specify primary key if it's 'id' or standard convention.
    }

     public function ratings()
    {
         // Morph relation to Rating where target_type = 'SiteExperience' and target_id = experience_id
         return $this->morphMany(Rating::class, 'target', 'target_type', 'target_id');
    }

     public function favorites()
    {
         // Morph relation to Favorite where target_type = 'SiteExperience' and target_id = experience_id
         return $this->morphMany(Favorite::class, 'target', 'target_type', 'target_id');
    }
// ...
```
*ملاحظة:* قد لا تحتاج لتحديد الأعمدة يدوياً إذا كان اسم النموذج (بدون الـ Namespace) هو `SiteExperience` واسم الـ morph في جدول `Comments` هو `target`. Eloquent ذكي في هذا. اختبر هذا أولاً، وإذا لم يعمل، استخدم التحديد اليدوي.

---

**الخطوة 8: إنشاء ملفات Seeders**

الـ Seeders تستخدم لملء قاعدة البيانات ببيانات أولية أو تجريبية. سننشئ Seeders لبعض الجداول الرئيسية.

```bash
php artisan make:seeder UserSeeder
php artisan make:seeder ProductCategorySeeder
php artisan make:seeder SiteCategorySeeder
php artisan make:seeder TouristSiteSeeder
php artisan make:seeder ProductSeeder
php artisan make:seeder HotelSeeder
php artisan make:seeder HotelRoomTypeSeeder
php artisan make:seeder HotelRoomSeeder
# يمكنك إنشاء المزيد حسب الحاجة (e.g., HotelBookingSeeder, SiteExperienceSeeder, ArticleSeeder, etc.)
```

---

**الخطوة 9: كتابة محتوى ملفات Seeders**

افتح ملفات Seeder التي تم إنشاؤها في مجلد `database/seeders/` واملأ دالة `run()` بمنطق إضافة البيانات.

**ملاحظات عامة:**

*   استخدم `DB::table('table_name')->insert([...])` لإضافة سجلات بسيطة.
*   استخدم `Model::create([...])` أو `Model::factory()->create()` لإضافة سجلات باستخدام Eloquent، وهذا أفضل لإنشاء العلاقات تلقائياً وتشغيل الـ events/observers.
*   استخدم `Hash::make('password')` لتشفير كلمات المرور.
*   عند إضافة بيانات لها علاقة بجداول أخرى، احصل على ID السجل الأب لاستخدامه كمفتاح أجنبي.

**أمثلة لمحتوى Seeders:**

*   **`DatabaseSeeder.php`**: هذا هو الملف الرئيسي الذي يشغل الـ Seeders الأخرى. افتحه وأضف استدعاءات للـ Seeders الأخرى داخل دالة `run()`:

    ```php
    <?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            $this->call([
                UserSeeder::class,
                ProductCategorySeeder::class,
                SiteCategorySeeder::class,
                // Add other seeders here in order of dependency (e.g., Categories before Products/Sites)
                TouristSiteSeeder::class,
                ProductSeeder::class,
                HotelSeeder::class,
                HotelRoomTypeSeeder::class,
                HotelRoomSeeder::class,
                // TouristActivitySeeder::class,
                // SiteExperienceSeeder::class,
                // ArticleSeeder::class,
                // Add seeders for polymorphic data (Favorites, Ratings, Comments) and orders if needed
                // FavoritesRatingsCommentsSeeder::class,
                // ProductOrderSeeder::class,
                // HotelBookingSeeder::class,
            ]);
        }
    }
    ```

*   **`UserSeeder.php`**: لإنشاء مستخدمين بأنواع مختلفة.

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\User; // Import the User model
    use Illuminate\Support\Facades\Hash; // Import Hash facade

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // Create an Admin user
            User::create([
                'username' => 'admin',
                'email' => 'admin@app.com',
                'password_hash' => Hash::make('password'), // Use password_hash and Hash::make
                'user_type' => 'Admin',
                'is_active' => true,
            ]);

             // Create a Tourist user
            User::create([
                'username' => 'tourist1',
                'email' => 'tourist1@app.com',
                'password_hash' => Hash::make('password'),
                'user_type' => 'Tourist',
                'is_active' => true,
            ]);

             // Create a Vendor user
            User::create([
                'username' => 'vendor1',
                'email' => 'vendor1@app.com',
                'password_hash' => Hash::make('password'),
                'user_type' => 'Vendor',
                'is_active' => true,
            ]);

             // Create a HotelBookingManager user
            User::create([
                'username' => 'hotelmanager1',
                'email' => 'hotelmanager1@app.com',
                'password_hash' => Hash::make('password'),
                'user_type' => 'HotelBookingManager',
                'is_active' => true,
            ]);

            // Create some random users using the User factory (if you set it up)
            // User::factory()->count(10)->create();
        }
    }
    ```
    *ملاحظة:* إذا كان لديك Factory لنموذج `User`، يمكنك استخدامه لإنشاء عدد كبير من المستخدمين العشوائيين بسهولة.

*   **`ProductCategorySeeder.php`**: لإنشاء فئات المنتجات.

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\ProductCategory; // Import the model

    class ProductCategorySeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // Create parent categories
            $textiles = ProductCategory::create(['name' => 'Textiles']);
            $pottery = ProductCategory::create(['name' => 'Pottery']);
            $jewelry = ProductCategory::create(['name' => 'Jewelry']);
            $woodwork = ProductCategory::create(['name' => 'Woodwork']);

            // Create some child categories
            ProductCategory::create(['name' => 'Embroidery', 'parent_category_id' => $textiles->category_id]);
            ProductCategory::create(['name' => 'Carpets', 'parent_category_id' => $textiles->category_id]);
            ProductCategory::create(['name' => 'Ceramic Art', 'parent_category_id' => $pottery->category_id]);
        }
    }
    ```

*   **`TouristSiteSeeder.php`**: لإنشاء مواقع سياحية.

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\TouristSite;
    use App\Models\SiteCategory; // Need categories to assign

    class TouristSiteSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // Make sure Site Categories exist first
            $historical = SiteCategory::where('name', 'Historical')->first() ?? SiteCategory::create(['name' => 'Historical']);
            $natural = SiteCategory::where('name', 'Natural')->first() ?? SiteCategory::create(['name' => 'Natural']);
             $cultural = SiteCategory::where('name', 'Cultural')->first() ?? SiteCategory::create(['name' => 'Cultural']);

            TouristSite::create([
                'name' => 'قلعة حلب',
                'description' => 'قلعة أثرية تاريخية في قلب مدينة حلب القديمة.',
                'location_text' => 'حلب، سوريا',
                'latitude' => 36.2007, // Example coordinates
                'longitude' => 36.1629,
                'city' => 'حلب',
                'category_id' => $historical->category_id,
                'main_image_url' => '/images/aleppo_castle.jpg', // Example path
            ]);

             TouristSite::create([
                'name' => 'تدمر',
                'description' => 'مدينة أثرية سورية قديمة تقع في البادية السورية.',
                'location_text' => 'تدمر، سوريا',
                 'latitude' => 34.5606,
                 'longitude' => 38.2725,
                'city' => 'تدمر',
                'category_id' => $historical->category_id,
                'main_image_url' => '/images/palmyra.jpg',
            ]);

             TouristSite::create([
                'name' => 'شلالات الزاوي',
                'description' => 'شلالات طبيعية جميلة في ريف اللاذقية.',
                'location_text' => 'اللاذقية، ريف اللاذقية',
                 'latitude' => null, // Example without coordinates
                 'longitude' => null,
                'city' => 'اللاذقية',
                'category_id' => $natural->category_id,
                'main_image_url' => '/images/zawyi_waterfalls.jpg',
            ]);

             TouristSite::create([
                'name' => 'المتحف الوطني بدمشق',
                'description' => 'أكبر المتاحف السورية ويضم آثاراً تعود لعصور مختلفة.',
                'location_text' => 'دمشق، شارع الشعلان',
                 'latitude' => 33.5127,
                 'longitude' => 36.2920,
                'city' => 'دمشق',
                'category_id' => $cultural->category_id,
                'main_image_url' => '/images/damascus_museum.jpg',
            ]);
        }
    }
    ```
    *ملاحظة:* تأكد من أن `SiteCategorySeeder` يعمل قبل هذا الـ Seeder، أو قم بإنشاء الفئات هنا كما في المثال إذا كانت بسيطة.

*   **`ProductSeeder.php`**: لإنشاء بعض المنتجات.

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Product;
    use App\Models\User; // To link products to a vendor
    use App\Models\ProductCategory; // To link products to a category

    class ProductSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // Get a vendor user (assuming UserSeeder ran)
            $vendor = User::where('user_type', 'Vendor')->first();

            // Get product categories (assuming ProductCategorySeeder ran)
            $textiles = ProductCategory::where('name', 'Textiles')->first();
            $embroidery = ProductCategory::where('name', 'Embroidery')->first();
             $pottery = ProductCategory::where('name', 'Pottery')->first();


            if ($vendor) {
                Product::create([
                    'seller_user_id' => $vendor->id,
                    'name' => 'وشاح حرير يدوي',
                    'description' => 'وشاح مصنوع يدوياً من الحرير الطبيعي بتطريز دمشقي.',
                    'stock_quantity' => 15,
                    'price' => 5000.00,
                    'main_image_url' => '/images/scarf.jpg',
                    'category_id' => $embroidery ? $embroidery->category_id : ($textiles ? $textiles->category_id : null),
                    'is_available' => true,
                ]);

                 Product::create([
                    'seller_user_id' => $vendor->id,
                    'name' => 'صحن فخاري مزجج',
                    'description' => 'صحن فخاري تقليدي مزجج بألوان زاهية.',
                    'stock_quantity' => 8,
                    'price' => 1200.00,
                    'main_image_url' => '/images/pottery_plate.jpg',
                    'category_id' => $pottery ? $pottery->category_id : null,
                    'is_available' => true,
                ]);

                // Add more products...
            } else {
                $this->command->info('Vendor user not found. Skipping ProductSeeder.');
            }
        }
    }
    ```

*   **بقية Seeders:** اتبع نفس المنطق للجداول الأخرى. تحتاج لإنشاء فنادق، أنواع غرف، غرف، مقالات، تجارب، وما إلى ذلك، مع ربطها بالمستخدمين المناسبين والجداول ذات الصلة (مثل المواقع السياحية للفنادق/التجارب، وفئات الفنادق للغرف، وما إلى ذلك).

---

**الخطوة 10: تشغيل Migrations والـ Seeders**

الآن بعد أن قمت بتعريف جميع جداول الهجرة ومحتوى الـ Seeders، يمكنك تشغيلها لإنشاء الجداول وملء قاعدة البيانات بالبيانات الأولية.

```bash
php artisan migrate:fresh --seed
```

*   `migrate:fresh`: يحذف جميع الجداول الموجودة (إذا كانت موجودة)، ثم يقوم بتشغيل جميع ملفات Migration بالترتيب.
*   `--seed`: يطلب من Laravel تشغيل الـ Seeders بعد انتهاء Migrations. سيقوم بتشغيل `DatabaseSeeder` الذي بدوره سيستدعي الـ Seeders الأخرى التي وضعتها فيه.

**تنبيه:** `migrate:fresh` سيمسح جميع البيانات الموجودة في قاعدة البيانات! استخدمه بحذر في بيئة التطوير فقط. في بيئة الإنتاج، استخدم `php artisan migrate` لتطبيق المهاجرات الجديدة فقط.

---

**الخطوات اللاحقة (ما بعد إعداد قاعدة البيانات والنماذج):**

11.  **بناء الـ APIs:** ستحتاج لإنشاء Controllers في مجلد `app/Http/Controllers/Api/` (أنشئ هذا المجلد)، تعريف Routes في `routes/api.php`، وإنشاء Request Classes للتحقق من صحة المدخلات. استخدم Sanctum Middleware (`auth:sanctum`) لحماية مسارات الـ API التي تتطلب مصادقة.
12.  **تطبيق منطق الأعمال:** كتابة الكود داخل الـ Controllers للتعامل مع طلبات الـ API (جلب البيانات، إضافة، تعديل، حذف، معالجة الحجوزات، الشراء، إلخ).
13.  **الاختبار:** كتابة Unit/Feature tests للتأكد من أن الـ API تعمل بشكل صحيح.
14.  **التوثيق:** توثيق الـ API (باستخدام أدوات مثل Swagger/OpenAPI Generator) لكي يتمكن فريق تطوير الواجهة الأمامية (Flutter/React Native) من فهم كيفية استخدام الـ API.
15.  **نشر التطبيق:** إعداد خادم للإنتاج ونشر تطبيق Laravel عليه.

---

هذه الخطوات تغطي عملية بناء قاعدة بيانات قوية ونماذج مرتبطة بها في Laravel، وإعداد نظام مصادقة API أساسي، وإنشاء بيانات تجريبية. هذه هي الأساس الذي ستبني عليه بقية الواجهة الخلفية لتطبيقك.



---


تمام، بناءً على مخطط قاعدة البيانات المعدل V2.1 ومتطلباتك لإنشاء Backend API ولوحة تحكم إدارية بسيطة باستخدام Laravel، إليك قائمة شاملة بتعليمات Artisan لإنشاء الملفات اللازمة، متبوعة بتصميم لملفات `web.php` و `api.php`.

سنستخدم Laravel Sanctum لمصادقة API، وهو مناسب لتطبيقات الجوال.

**ملاحظات هامة قبل البدء:**

*   هذه القائمة تغطي *إنشاء* الملفات فقط. ستحتاج إلى كتابة المنطق الفعلي داخل هذه الملفات (Migration Schema، Model relationships/fillables، Controller logic، Request validation، Resource formatting).
*   سنستخدم أسماء قياسية للملفات والمتحكمات بناءً على مواردك (Users, Products, TouristSites, etc.).
*   لتبسيط لوحة التحكم الإدارية، سنفترض نمط "الموارد" (Resourceful Controllers) لمعظم الجداول التي تحتاج إدارة CRUD (Create, Read, Update, Delete).
*   لـ API، سنستخدم المتحكمات التي ترجع JSON. بعضها سيكون "Resourceful API Controllers".
*   افتراضياً، جدول `users` ونموذجه موجودان بالفعل. عدلناهم في الخطوة السابقة. تعليمات `make:model` هنا ستكون للجداول *الأخرى* غير `users`.
*   **بالنسبة للحقول Polymorphic** (`Favorites`, `Ratings`, `Comments`): ستتعامل مع هذه الجداول في API Controllers الخاصة بها، حيث ستحدد `target_type` و `target_id` بناءً على الطلب الوارد (مثلاً، إضافة تقييم لمنتج، أو تعليق على مقال). النماذج تم تعريفها في الخطوة السابقة بعلاقات `morphTo`/`morphMany`.

---

**الجزء الأول: تعليمات Artisan لإنشاء الملفات**

افتح سطر الأوامر في جذر مشروع Laravel (تأكد من أنك داخل مجلد `smart-tourism-app` الذي أنشأته سابقاً). نفذ التعليمات التالية بالترتيب:

**1. إنشاء Migration وملفات Models (لجداول قاعدة البيانات الجديدة)**

لقد قمت بإنشاء هذه في الخطوة السابقة مع `-m`، ولكن أعيد تكرار التعليمات هنا للتأكيد:

```bash
php artisan make:model UserProfile -m
php artisan make:model UserPhoneNumber -m
php artisan make:model ProductCategory -m
php artisan make:model Product -m
php artisan make:model ShoppingCartItem -m
php artisan make:model ProductOrder -m
php artisan make:model ProductOrderItem -m
php artisan make:model SiteCategory -m
php artisan make:model TouristSite -m
php artisan make:model TouristActivity -m
php artisan make:model Hotel -m
php artisan make:model HotelRoomType -m
php artisan make:model HotelRoom -m
php artisan make:model HotelBooking -m
php artisan make:model SiteExperience -m
php artisan make:model Article -m
php artisan make:model Favorite -m
php artisan make:model Rating -m
php artisan make:model Comment -m
```
*(الملف `create_users_table.php` موجود بالفعل، قم بتعديله كما في الخطوة السابقة).*

**2. إنشاء Controllers (واجهة Web الإدارية)**

هذه المتحكمات ستستخدم لعرض صفحات لوحة التحكم الإدارية وإدارة البيانات عبر واجهة Web تقليدية. سنستخدم `--resource` لإنشاء جميع الدوال القياسية (index, create, store, show, edit, update, destroy).

```bash
# Users management (separate from public auth)
php artisan make:controller Admin/UserController --resource

# Product Management
php artisan make:controller Admin/ProductCategoryController --resource
php artisan make:controller Admin/ProductController --resource
php artisan make:controller Admin/ProductOrderController --resource

# Tourism Content Management
php artisan make:controller Admin/SiteCategoryController --resource
php artisan make:controller Admin/TouristSiteController --resource
php artisan make:controller Admin/TouristActivityController --resource
php artisan make:controller Admin/HotelController --resource
php artisan make:controller Admin/HotelRoomTypeController --resource
php artisan make:controller Admin/HotelRoomController --resource
php artisan make:controller Admin/HotelBookingController --resource
php artisan make:controller Admin/SiteExperienceController --resource
php artisan make:controller Admin/ArticleController --resource

# Consider controllers for reviewing / moderating polymorphic content if needed
# php artisan make:controller Admin/ReviewController --resource
# php artisan make:controller Admin/CommentModerationController --resource
# php artisan make:controller Admin/FavoriteReviewController --resource
```
*ملاحظة:* تم وضع هذه المتحكمات في مجلد `Admin` داخل `app/Http/Controllers` لتنظيم أفضل.

**3. إنشاء Controllers (واجهة API لتطبيق الجوال)**

هذه المتحكمات ستخدم تطبيق الجوال. سنستخدم `--api` لإنشاء الدوال المناسبة لـ API (index, store, show, update, destroy، بدون create/edit views). بعض الوظائف (مثل تسجيل الدخول/الخروج، إدارة السلة، المفضلة، التقييمات، التعليقات) تتطلب متحكمات مخصصة غير موردية تماماً.

```bash
# API Authentication (Login, Register, Logout using Sanctum)
php artisan make:controller Api/AuthController

# User Profile API
php artisan make:controller Api/UserProfileController

# Product related API
php artisan make:controller Api/ProductController --api # Browse/View products
php artisan make:controller Api/ProductCategoryController --api # List categories
php artisan make:controller Api/ShoppingCartController # Manage user's cart
php artisan make:controller Api/ProductOrderController # Place/View user's orders

# Tourism Content API
php artisan make:controller Api/TouristSiteController --api # Browse/View sites
php artisan make:controller Api/SiteCategoryController --api # List categories
php artisan make:controller Api/TouristActivityController --api # Browse/View activities
php artisan make:controller Api/HotelController --api # Browse/View hotels
# HotelRoomController might not be needed as rooms are typically viewed via hotel details
# php artisan make:controller Api/HotelRoomController --api
php artisan make:controller Api/HotelBookingController # Manage user's hotel bookings
php artisan make:controller Api/SiteExperienceController --api # User's site experiences/reviews
php artisan make:controller Api/ArticleController --api # Browse/View articles (Blog)

# Polymorphic related API (User actions like favorite, rate, comment)
php artisan make:controller Api/FavoriteController # Add/Remove/View user's favorites
php artisan make:controller Api/RatingController # Add/Update/Delete/View ratings
php artisan make:controller Api/CommentController # Add/Update/Delete/View comments (can be nested/reply)
```
*ملاحظة:* تم وضع هذه المتحكمات في مجلد `Api` داخل `app/Http/Controllers`.

**4. إنشاء Request Classes (للتحقق من صحة المدخلات)**

ستحتاج لإنشاء Request class لكل عملية تستقبل بيانات من المستخدم (نماذج الإدخال في الويب الإدارية، أو حمولات JSON في API).

```bash
# Auth Requests
php artisan make:request Auth/LoginRequest
php artisan make:request Auth/RegisterRequest

# User Profile Requests
php artisan make:request UserProfile/UpdateProfileRequest

# Product Requests
php artisan make:request Product/StoreProductRequest
php artisan make:request Product/UpdateProductRequest
php artisan make:request ProductCategory/StoreProductCategoryRequest
php artisan make:request ProductCategory/UpdateProductCategoryRequest
php artisan make:request ShoppingCart/AddToCartRequest
php artisan make:request ShoppingCart/UpdateCartItemRequest
php artisan make:request ProductOrder/PlaceOrderRequest

# Tourism Content Requests
php artisan make:request TouristSite/StoreTouristSiteRequest
php artisan make:request TouristSite/UpdateTouristSiteRequest
php artisan make:request SiteCategory/StoreSiteCategoryRequest
php artisan make:request SiteCategory/UpdateSiteCategoryRequest
php artisan make:request TouristActivity/StoreTouristActivityRequest
php artisan make:request TouristActivity/UpdateTouristActivityRequest
php artisan make:request Hotel/StoreHotelRequest
php artisan make:request Hotel/UpdateHotelRequest
php artisan make:request HotelRoomType/StoreHotelRoomTypeRequest
php artisan make:request HotelRoomType/UpdateHotelRoomTypeRequest
php artisan make:request HotelRoom/StoreHotelRoomRequest
php artisan make:request HotelRoom/UpdateHotelRoomRequest
php artisan make:request HotelBooking/StoreHotelBookingRequest
# php artisan make:request HotelBooking/UpdateHotelBookingRequest # Maybe update is not allowed after booking

# Content Requests
php artisan make:request SiteExperience/StoreSiteExperienceRequest
php artisan make:request SiteExperience/UpdateSiteExperienceRequest
php artisan make:request Article/StoreArticleRequest
php artisan make:request Article/UpdateArticleRequest

# Polymorphic Action Requests
php artisan make:request Favorite/ToggleFavoriteRequest # For adding/removing a favorite
php artisan make:request Rating/StoreRatingRequest
php artisan make:request Rating/UpdateRatingRequest
php artisan make:request Comment/StoreCommentRequest
php artisan make:request Comment/UpdateCommentRequest
```
*ملاحظة:* هذه قائمة شاملة للطلبات المحتملة. يمكنك إنشاء الطلبات حسب الحاجة أثناء تطوير كل ميزة. يتم وضع هذه الملفات في مجلد `app/Http/Requests`. أنشئ المجلدات الفرعية (Auth, UserProfile, etc.) لتنظيم أفضل.

**5. إنشاء Resource Classes (لتنسيق مخرجات API)**

ستحتاج Resource class لكل نموذج بيانات تقوم بإرجاعه في استجابات API.

```bash
php artisan make:resource UserResource
php artisan make:resource UserProfileResource
php artisan make:resource UserPhoneNumberResource
php artisan make:resource ProductCategoryResource
php artisan make:resource ProductResource
php artisan make:resource ShoppingCartItemResource
php artisan make:resource ProductOrderResource
php artisan make:resource ProductOrderItemResource # May or may not need a dedicated resource, can be nested in OrderResource
php artisan make:resource SiteCategoryResource
php artisan make:resource TouristSiteResource
php artisan make:resource TouristActivityResource
php artisan make:resource HotelResource
php artisan make:resource HotelRoomTypeResource
php artisan make:resource HotelRoomResource
php artisan make:resource HotelBookingResource
php artisan make:resource SiteExperienceResource
php artisan make:resource ArticleResource
php artisan make:resource FavoriteResource
php artisan make:resource RatingResource
php artisan make:resource CommentResource
```
*ملاحظة:* يتم وضع هذه الملفات في مجلد `app/Http/Resources`.

**6. إنشاء View Files (لصفحات الويب الإدارية)**

هذه الملفات ستكون قوالب HTML التي سيتم عرضها بواسطة متحكمات الويب الإدارية.

```bash
# Admin Layout (e.g., basic admin layout)
php artisan make:view layouts/admin

# Dashboard
php artisan make:view admin/dashboard

# User Management Views
php artisan make:view admin/users/index
php artisan make:view admin/users/create
php artisan make:view admin/users/edit
php artisan make:view admin/users/show # Optional

# Product Management Views
php artisan make:view admin/products/index
php artisan make:view admin/products/create
php artisan make:view admin/products/edit
php artisan make:view admin/products/show # Optional
php artisan make:view admin/product_categories/index
php artisan make:view admin/product_categories/create
php artisan make:view admin/product_categories/edit

# Order Management Views
php artisan make:view admin/product_orders/index
php artisan make:view admin/product_orders/show

# Tourism Content Management Views
php artisan make:view admin/tourist_sites/index
php artisan make:view admin/tourist_sites/create
php artisan make:view admin/tourist_sites/edit
php artisan make:view admin/tourist_sites/show
php artisan make:view admin/site_categories/index
php artisan make:view admin/site_categories/create
php artisan make:view admin/site_categories/edit
php artisan make:view admin/tourist_activities/index
php artisan make:view admin/tourist_activities/create
php artisan make:view admin/tourist_activities/edit
php artisan make:view admin/hotels/index
php artisan make:view admin/hotels/create
php artisan make:view admin/hotels/edit
php artisan make:view admin/hotels/show
php artisan make:view admin/hotel_room_types/index
php artisan make:view admin/hotel_room_types/create
php artisan make:view admin/hotel_room_types/edit
php artisan make:view admin/hotel_rooms/index
php artisan make:view admin/hotel_rooms/create
php artisan make:view admin/hotel_rooms/edit
php artisan make:view admin/hotel_bookings/index
php artisan make:view admin/hotel_bookings/show

# Content Management Views
php artisan make:view admin/site_experiences/index # For moderation
php artisan make:view admin/site_experiences/show # For moderation/details
php artisan make:view admin/articles/index
php artisan make:view admin/articles/create
php artisan make:view admin/articles/edit
php artisan make:view admin/articles/show

# Views for managing polymorphic content (ratings, comments) - potentially integrated into resource views (e.g., view comments on a product page)
# Or separate views for moderation:
# php artisan make:view admin/ratings/index
# php artisan make:view admin/comments/index
```
*ملاحظة:* يتم وضع هذه الملفات في مجلد `resources/views`. أنشئ المجلدات الفرعية (layouts, admin, admin/users, etc.) لتنظيم أفضل.

**7. إنشاء Seeders (لبيانات تجريبية)**

كما ذكرنا في الخطوة السابقة، ستحتاج لإنشاء Seeders. أعد تكرار التعليمات هنا للتأكيد:

```bash
# General Seeders (already created some of these)
php artisan make:seeder UserSeeder
php artisan make:seeder ProductCategorySeeder
php artisan make:seeder SiteCategorySeeder
php artisan make:seeder TouristSiteSeeder
php artisan make:seeder ProductSeeder
php artisan make:seeder HotelSeeder
php artisan make:seeder HotelRoomTypeSeeder
php artisan make:seeder HotelRoomSeeder
# Seeders for data that depends on the above (e.g., relationships, user-generated content)
# php artisan make:seeder TouristActivitySeeder
# php artisan make:seeder HotelBookingSeeder
# php artisan make:seeder SiteExperienceSeeder
# php artisan make:seeder ArticleSeeder
# Seeders for polymorphic data (more complex, might need custom logic)
# php artisan make:seeder FavoritesRatingsCommentsSeeder
```

---

**الجزء الثاني: تصميم ملفات `web.php` و `api.php`**

هذه الملفات تحدد نقاط النهاية (Endpoints) لتطبيقك وكيفية توجيه الطلبات الواردة إلى المتحكمات المناسبة.

**1. ملف `routes/web.php` (لواجهة الويب الإدارية)**

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin; // Import the Admin controllers namespace

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public facing simple routes (optional)
// Route::get('/', function () { return view('welcome'); });
// Route::get('/about', function () { return view('about'); });

// Admin Panel Routes
// Group admin routes under a prefix and apply middleware (e.g., auth, admin role)
Route::prefix('admin')->middleware(['auth', 'can:access-admin-panel'])->group(function () {

    // Admin Dashboard
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin.dashboard'); // You'll need to create Admin\DashboardController

    // Resource Management Routes (using Route::resource)
    Route::resource('users', Admin\UserController::class);
    Route::resource('product-categories', Admin\ProductCategoryController::class);
    Route::resource('products', Admin\ProductController::class);
    Route::resource('product-orders', Admin\ProductOrderController::class)->only(['index', 'show']); // Maybe limited actions via admin panel

    Route::resource('site-categories', Admin\SiteCategoryController::class);
    Route::resource('tourist-sites', Admin\TouristSiteController::class);
    Route::resource('tourist-activities', Admin\TouristActivityController::class);

    Route::resource('hotels', Admin\HotelController::class);
    Route::resource('hotel-room-types', Admin\HotelRoomTypeController::class);
    Route::resource('hotel-rooms', Admin\HotelRoomController::class);
    Route::resource('hotel-bookings', Admin\HotelBookingController::class)->only(['index', 'show']); // Maybe limited actions

    Route::resource('site-experiences', Admin\SiteExperienceController::class); // For moderation
    Route::resource('articles', Admin\ArticleController::class);

    // Routes for managing polymorphic content (optional, could be part of resource pages)
    // Route::get('ratings', [Admin\RatingController::class, 'index'])->name('admin.ratings.index');
    // Route::get('comments', [Admin\CommentController::class, 'index'])->name('admin.comments.index');

    // Add more admin-specific routes here as needed (e.g., reports, settings, payment gateway config)

});

// Admin Authentication Routes (if using Laravel's built-in auth for admin panel)
// You might use Breeze/Jetstream or custom auth for admin login
// Example (if using custom auth):
// Route::get('admin/login', [Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('admin/login', [Admin\Auth\LoginController::class, 'login']);
// Route::post('admin/logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

// Fallback route for SPA or generic welcome
Route::get('/{any}', function () {
    return view('welcome'); // Or your admin panel's base view
})->where('any', '.*'); // Catch all route for SPA (if admin is an SPA)
```
*ملاحظات على `web.php`:*
*   `middleware(['auth', 'can:access-admin-panel'])`: يفترض أن لديك نظام مصادقة (مثل Laravel Breeze) وقدرة (Ability) أو دور (Role) يسمى `access-admin-panel` معرف في ملف `app/Providers/AuthServiceProvider.php` لتحديد من يمكنه الوصول إلى لوحة التحكم الإدارية.
*   `Admin\DashboardController`: تحتاج لإنشاء هذا المتحكم يدوياً (لم ننشئه باستخدام `--resource` أعلاه لأنه ليس مورد CRUD قياسي). `php artisan make:controller Admin/DashboardController`.
*   `Route::resource()->only([...])`: استخدم `only` أو `except` لتحديد الدوال المسموح بها للمورد إذا لم تكن جميع عمليات CRUD متاحة مباشرة.
*   إذا كانت لوحة التحكم الإدارية تطبيق SPA (Single Page Application)، فقد تحتاج إلى تعديل `web.php` ليخدم ملف HTML واحد يحتوي على تطبيق SPA، وتستخدم الـ API للتعامل مع البيانات. المسار الأخير `Route::get('/{any}', ...)` مناسب لهذا الغرض.

**2. ملف `routes/api.php` (لواجهة API لتطبيق الجوال)**

```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api; // Import the API controllers namespace

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes (using Sanctum)
Route::post('/register', [Api\AuthController::class, 'register']);
Route::post('/login', [Api\AuthController::class, 'login']);

// Protected routes (require Sanctum token)
Route::middleware('auth:sanctum')->group(function () {

    // User Authentication (Logout and get authenticated user)
    Route::post('/logout', [Api\AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user(); // Returns authenticated user details
    });

    // User Profile
    Route::get('/profile', [Api\UserProfileController::class, 'show']);
    Route::put('/profile', [Api\UserProfileController::class, 'update']); // Use PUT for full update, PATCH for partial

    // Shopping Cart
    Route::get('/cart', [Api\ShoppingCartController::class, 'index']);
    Route::post('/cart/add', [Api\ShoppingCartController::class, 'store']); // Add item to cart
    Route::put('/cart/{item}', [Api\ShoppingCartController::class, 'update']); // Update item quantity
    Route::delete('/cart/{item}', [Api\ShoppingCartController::class, 'destroy']); // Remove item

    // Product Orders
    Route::get('/my-orders', [Api\ProductOrderController::class, 'index']); // View user's orders
    Route::get('/my-orders/{order}', [Api\ProductOrderController::class, 'show']); // View single order
    Route::post('/orders', [Api\ProductOrderController::class, 'store']); // Place a new order (from cart)

    // Hotel Bookings
    Route::get('/my-bookings', [Api\HotelBookingController::class, 'index']); // View user's bookings
    Route::get('/my-bookings/{booking}', [Api\HotelBookingController::class, 'show']); // View single booking
    Route::post('/bookings', [Api\HotelBookingController::class, 'store']); // Place a new booking
    // Route::delete('/bookings/{booking}', [Api\HotelBookingController::class, 'destroy']); // Option to cancel booking?

    // Site Experiences (User can manage their own)
    Route::apiResource('my-experiences', Api\SiteExperienceController::class); // CRUD for user's experiences

    // Polymorphic Actions (Favorites, Ratings, Comments)
    Route::post('/favorites/toggle', [Api\FavoriteController::class, 'toggle']); // Add or remove a favorite
    Route::get('/my-favorites', [Api\FavoriteController::class, 'index']); // View user's favorites (Polymorphic)

    Route::apiResource('ratings', Api\RatingController::class)->only(['store', 'update', 'destroy']); // Users add/update/delete their own ratings
    // Note: Getting ratings for a specific target (site, product) would likely be a method on the target's controller
    // e.g., GET /api/tourist-sites/{site}/ratings -> TouristSiteController@ratings (or similar)

    Route::apiResource('comments', Api\CommentController::class)->only(['store', 'update', 'destroy']); // Users add/update/delete their own comments
    // Note: Getting comments for a specific target (article, product) would likely be a method on the target's controller
    // e.g., GET /api/articles/{article}/comments -> ArticleController@comments (or similar)
     Route::get('/comments/{comment}/replies', [Api\CommentController::class, 'replies']); // Get replies for a comment


     // Example of fetching ratings/comments for a target via its resource controller
     // (You'd add methods like 'ratings', 'comments', 'favorites' to those controllers)
     // Route::get('/tourist-sites/{site}/ratings', [Api\TouristSiteController::class, 'ratings']);
     // Route::get('/products/{product}/comments', [Api\ProductController::class, 'comments']);

    // Add more protected API routes here as needed
});


// Publicly Accessible API Routes (do NOT require Sanctum token)
// Users can browse/view resources without logging in
Route::get('/products', [Api\ProductController::class, 'index']);
Route::get('/products/{product}', [Api\ProductController::class, 'show']);
Route::get('/product-categories', [Api\ProductCategoryController::class, 'index']); // List categories

Route::get('/tourist-sites', [Api\TouristSiteController::class, 'index']);
Route::get('/tourist-sites/{touristSite}', [Api\TouristSiteController::class, 'show']);
Route::get('/site-categories', [Api\SiteCategoryController::class, 'index']); // List categories

Route::get('/tourist-activities', [Api\TouristActivityController::class, 'index']);
Route::get('/tourist-activities/{touristActivity}', [Api\TouristActivityController::class, 'show']);

Route::get('/hotels', [Api\HotelController::class, 'index']);
Route::get('/hotels/{hotel}', [Api\HotelController::class, 'show']);

Route::get('/articles', [Api\ArticleController::class, 'index']);
Route::get('/articles/{article}', [Api\ArticleController::class, 'show']);

// Public endpoints to get ratings/comments for a target (optional, can be done via target controller)
Route::get('/{targetType}/{targetId}/ratings', [Api\RatingController::class, 'indexForTarget']); // You'd need indexForTarget method
Route::get('/{targetType}/{targetId}/comments', [Api\CommentController::class, 'indexForTarget']); // You'd need indexForTarget method

// ... add other publicly accessible routes
```
*ملاحظات على `api.php`:*
*   `Route::middleware('auth:sanctum')->group(...)`: جميع المسارات داخل هذا التجميع تتطلب توكن Sanctum صالح في رأس الطلب (`Authorization: Bearer YOUR_TOKEN`).
*   `Route::apiResource()`: يوفر مجموعة من المسارات القياسية لعمليات CRUD (index, store, show, update, destroy).
*   المسارات العامة (Public) توضع خارج التجميع الذي يستخدم `auth:sanctum`.
*   بالنسبة للجداول المتعددة الأشكال (Favorites, Ratings, Comments)، تحتاج إلى تصميم نقاط نهاية API التي تستقبل `target_type` و `target_id` في الطلبات (POST/PUT/DELETE) أو كجزء من عنوان URL (GET). المسارات المقترحة هي أمثلة على كيفية القيام بذلك.

---

**الخطوات التالية:**

1.  **نفذ جميع أوامر `php artisan make:...`** المذكورة في الجزء الأول.
2.  **املأ محتوى ملفات Migration:** افتح ملفات `database/migrations/*_create_*.php` وقم بكتابة الـ schema لكل جدول بناءً على مخطط قاعدة البيانات V2.1.
3.  **نفذ `php artisan migrate:fresh --seed`** لتشغيل جميع Migrations وملء القاعدة ببيانات تجريبية (بعد كتابة محتوى Seeders).
4.  **املأ محتوى ملفات Models:** افتح ملفات `app/Models/*.php` وقم بتعريف `$fillable`/`$guarded` والعلاقات (`belongsTo`, `hasMany`, `morphTo`, `morphMany`).
5.  **املأ محتوى ملفات Request:** افتح ملفات `app/Http/Requests/*/*.php` وقم بكتابة قواعد التحقق من صحة المدخلات في دالة `rules()`.
6.  **املأ محتوى ملفات Resource:** افتح ملفات `app/Http/Resources/*.php` وحدد كيف يجب تنسيق بيانات النموذج عند إرجاعها كـ JSON.
7.  **املأ محتوى ملفات Controller:** افتح ملفات `app/Http/Controllers/**/*.php` واكتب منطق التعامل مع كل طلب (جلب بيانات، حفظ، تحديث، حذف، منطق الحجز، إلخ).
8.  **املأ محتوى ملفات View:** افتح ملفات `resources/views/**/*.blade.php` وقم بتصميم واجهة المستخدم للوحة التحكم الإدارية باستخدام Blade templating.
9.  **اختبر نقاط النهاية:** استخدم أدوات مثل Postman لاختبار API endpoints، وتصفح لوحة التحكم الإدارية في المتصفح.

هذه الخطوات توفر الهيكل الكامل لمشروعك. الآن يبدأ العمل على بناء المنطق داخل كل ملف تم إنشاؤه. بالتوفيق في مشروعك!


---


نعم، ملاحظتك دقيقة جداً وصحيحة. في الإصدارات الحديثة من Laravel (خاصة من Laravel 9 فصاعداً عند إنشاء مشروع بدون تحديد حزمة Starter Kit للمصادقة)، لا يتم إنشاء ملف `routes/api.php` بشكل افتراضي. السبب هو أن بنية المشروع الأساسية أصبحت تركز أكثر على تطبيقات الويب التقليدية ما لم تطلب صراحة مكونات API.

**ماذا يعني هذا؟**

1.  **يجب عليك إنشاء ملف `routes/api.php` يدوياً.**
2.  **الأهم:** يجب عليك التأكد من أن Laravel يعرف أنه يجب تحميل هذا الملف وتطبيق الـ Middleware المناسب عليه. يتم ذلك بواسطة ملف `app/Providers/RouteServiceProvider.php`.

**الخطوات الإضافية المطلوبة:**

1.  **إنشاء ملف `routes/api.php`:**
    في مجلد `routes` داخل مشروعك، أنشئ ملفاً جديداً باسم `api.php`.

    ```bash
    # تأكد من أنك في جذر المشروع smart-tourism-app
    touch routes/api.php
    ```
    أو ببساطة قم بإنشائه باستخدام محرر النصوص الخاص بك في المسار `your-project-name/routes/api.php`.

2.  **تكوين `RouteServiceProvider`:**
    هذا هو الجزء الأهم. افتح ملف `app/Providers/RouteServiceProvider.php`. ستجد فيه عادةً دالة `boot()` أو `map()` (اعتماداً على إصدار Laravel الدقيق، ولكن `boot()` هي الطريقة الحديثة). داخل هذه الدالة، يتم تعريف كيفية تحميل ملفات المسارات وتطبيق الـ Middleware عليها.

    ابحث عن الجزء الذي يتعلق بـ API. قد يكون موجوداً ولكن معطلاً، أو قد تحتاج لإضافته. الكود النموذجي في الإصدارات الحديثة داخل دالة `boot()` يبدو كالتالي:

    ```php
    <?php

    namespace App\Providers;

    use Illuminate\Cache\RateLimiting\Limit;
    use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\RateLimiter;
    use Illuminate\Support\Facades\Route;

    class RouteServiceProvider extends ServiceProvider
    {
        /**
         * The path to your application's "home" route.
         *
         * Typically, users are redirected here after authentication.
         *
         * @var string
         */
        public const HOME = '/home'; // يمكنك تغيير هذا حسب الحاجة

        /**
         * Define your route model bindings, pattern filters, and other route configuration.
         */
        public function boot(): void
        {
            RateLimiter::for('api', function (Request $request) {
                return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
            });

            $this->routes(function () {
                // This is where API and Web routes are typically defined/loaded

                // Web routes
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));

                // API routes - Make sure this block exists and is not commented out
                Route::middleware('api') // Apply the 'api' middleware group
                    ->prefix('api') // Prefix all routes in api.php with /api
                    ->group(base_path('routes/api.php')); // Load the api.php file
            });
        }
        // ... بقية الكلاس ...
    }
    ```

    **التحقق المطلوب:**

    *   تأكد من وجود الكتلة الخاصة بـ `Route::middleware('api')...`.
    *   تأكد من أنها ليست معطلة (ليست داخل تعليق `/* ... */`).
    *   تأكد من أنها تشير إلى ملف `routes/api.php`.

    إذا كانت هذه الكتلة غير موجودة، أضفها داخل دالة `boot()` في المكان المناسب (عادةً بعد تحميل مسارات الويب).

3.  **فهم Middleware Group `api`:**
    ملف `app/Http/Kernel.php` يعرف مجموعات الـ Middleware القياسية. ابحث عن `$middlewareGroups`. ستجد مجموعة `api` معرفة هنا.

    ```php
    protected $middlewareGroups = [
        'web' => [
            // ... web middleware like Session, csrf token, etc.
        ],

        'api' => [
            // Laravel's recommended API middleware
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Keep for SPA, remove or comment for mobile pure API
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api', // Rate limiting
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            // ... other API middleware
        ],
    ];
    ```
    *ملاحظة:* لمشروع API جوال (عادةً لا يستخدم Session أو Stateful requests بنفس طريقة SPA)، قد تحتاج إلى تعطيل أو إزالة `EnsureFrontendRequestsAreStateful::class` من مجموعة `api` middleware في Kernel.php. هذا يعتمد على كيفية تخطيطك للمصادقة بالضبط (هل ستستخدم Cookies للمصادقة الأولية مع SPA؟ أم فقط Tokens عبر Authorization header للموبايل؟). لموبايل API، غالباً ما يتم إزالته.

**ملخص ما يجب فعله:**

1.  أنشئ ملف `routes/api.php` في مجلد `routes`.
2.  افتح `app/Providers/RouteServiceProvider.php` وتأكد من وجود الكود الذي يحمل ملف `routes/api.php` ويطبق عليه الـ `api` middleware group. إذا لم يكن موجوداً، قم بإضافته.
3.  (اختياري ومتقدم) إذا كنت تبني فقط Mobile API ولا تستخدم SPA، قد تفكر في تعطيل `EnsureFrontendRequestsAreStateful::class` في مجموعة الـ `api` middleware في `app/Http/Kernel.php`.
4.  الآن يمكنك وضع تعريفات الـ API الخاصة بك (مثل `Route::post('/register', ...)`) داخل ملف `routes/api.php` الذي أنشأته. سيتم الوصول إليها ببادئة `/api/`.

بهذه الخطوات، سيتم تحميل ملف `api.php` ومعالجة مسارات الـ API بشكل صحيح بواسطة Laravel.

---



تمام، لا مشكلة على الإطلاق. الاعتماد على convention لارفل (استخدام `id` كمفتاح أساسي تلقائي التزايد) هو بالفعل النهج الأكثر شيوعاً وتبسيطاً في معظم الحالات، ويجنب الحاجة لتحديد `$primaryKey` و `$incrementing` و `$keyType` في معظم النماذج.

سنقوم بإعادة بناء جميع ملفات النماذج بناءً على هذا التغيير، مع الأخذ في الاعتبار أن كل جدول الآن يحتوي على عمود مفتاح أساسي واحد فقط اسمه `id` (من نوع `unsignedBigInteger` تلقائي التزايد)، وأن جميع المفاتيح الأجنبية تشير إلى هذا العمود `id` في الجداول الأخرى.

**ملاحظة:** هذا يعني أنك قمت بتعديل جميع ملفات Migration التي أنشأتها سابقاً لتصبح بهذا الشكل:

```php
Schema::create('table_name', function (Blueprint $table) {
    $table->id(); // Primary key named 'id'
    // ... other columns ...
    $table->foreignId('foreign_table_id')->constrained()->onDelete(...); // Foreign key referring to 'id'
    // ...
});
```
مع ملاحظة أن `foreignId()` في Laravel هي اختصار لـ `unsignedBigInteger('foreign_table_id')` وإضافة المفتاح الأجنبي الذي يشير تلقائياً إلى عمود `id` في جدول `foreign_table` (الذي يستنتج من اسم العمود).

الآن، لنعيد بناء ملفات Models:

**تحديث نموذج `app/Models/User.php`**

```php
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Primary key is 'id' by default, no need to specify $primaryKey

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password_hash', // Using password_hash as per your schema
        'user_type',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime', // Uncomment if using email verification
        'password_hash' => 'hashed', // Note: Laravel's default Auth expects 'password' column.
                                    // If keeping 'password_hash', you might need custom logic
                                    // for login using Hash::check() or a custom Auth provider.
                                    // For simplicity with built-in auth features (like password reset),
                                    // renaming the column to 'password' in the migration is often easier.
                                    // Assuming you handle password verification manually for API.
        'is_active' => 'boolean',
    ];

    // Define relationships here

    public function profile()
    {
        // One-to-One relation where User has one profile. Profile table has user_id FK.
        // Laravel expects FK named user_profile_id by default, but your schema has user_id.
        // No need to specify 'user_id' explicitly if the FK in user_profiles table is named 'user_id'.
        // It's standard 'user_id' -> belongsTo(User), User hasOne -> belongsTo(UserProfile).
        return $this->hasOne(UserProfile::class); // Laravel infers FK name 'user_id' on UserProfiles
    }

    public function phoneNumbers()
    {
        // One-to-Many relation where User has many phone numbers. PhoneNumbers table has user_id FK.
        return $this->hasMany(UserPhoneNumber::class); // Laravel infers FK name 'user_id' on UserPhoneNumbers
    }

    public function products()
    {
        // One-to-Many relation where User (as seller/vendor) has many products. Products table has seller_user_id FK.
        return $this->hasMany(Product::class, 'seller_user_id'); // Specify FK name if not user_id
    }

    public function shoppingCartItems()
    {
        // One-to-Many relation where User has many cart items. ShoppingCartItems table has user_id FK.
         return $this->hasMany(ShoppingCartItem::class);
    }

    public function productOrders()
    {
        // One-to-Many relation where User has many product orders. ProductOrders table has user_id FK.
         return $this->hasMany(ProductOrder::class);
    }

    public function touristSitesAdded()
    {
        // One-to-Many relation where User added many sites. TouristSites table has added_by_user_id FK.
         return $this->hasMany(TouristSite::class, 'added_by_user_id');
    }

    public function touristActivitiesOrganized()
    {
        // One-to-Many relation where User organized many activities. TouristActivities table has organizer_user_id FK.
         return $this->hasMany(TouristActivity::class, 'organizer_user_id');
    }

     public function hotelsManaged()
    {
        // One-to-Many relation where User manages many hotels. Hotels table has managed_by_user_id FK.
         return $this->hasMany(Hotel::class, 'managed_by_user_id');
    }

     public function hotelBookings()
    {
        // One-to-Many relation where User has many hotel bookings. HotelBookings table has user_id FK.
         return $this->hasMany(HotelBooking::class);
    }

     public function siteExperiences()
    {
        // One-to-Many relation where User wrote many experiences. SiteExperiences table has user_id FK.
         return $this->hasMany(SiteExperience::class);
    }

     public function articlesAuthored()
    {
        // One-to-Many relation where User authored many articles. Articles table has author_user_id FK.
         return $this->hasMany(Article::class, 'author_user_id');
    }

    // Polymorphic relationships where User is the source of the action (Many-to-One polymorphic)
    // e.g., User has many Favorites (where Favorite's user_id is this user's id)
    public function favorites()
    {
        return $this->hasMany(Favorite::class); // Favorite model has user_id FK
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class); // Rating model has user_id FK
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // Comment model has user_id FK
    }

    // Accessors or methods for role checking
    public function isAdmin()
    {
        return $this->user_type === 'Admin';
    }

     public function isVendor()
    {
        return $this->user_type === 'Vendor';
    }

    public function isTourist()
    {
        return $this->user_type === 'Tourist';
    }

     // ... methods for other user types
}
```

**`app/Models/UserProfile.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    // Primary key is 'id' by default, no need to specify $primaryKey
    // Auto-incrementing is true by default
    // Key type is int (unsignedBigInteger) by default

    // Assuming migration now includes $table->id() and $table->foreignId('user_id')...
    // So, 'id' is the PK for UserProfile, and 'user_id' is a regular FK.

    protected $fillable = [
        'user_id', // Now user_id is fillable as it's an FK, not the PK
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'passport_image_url',
        'bio',
        'profile_picture_url',
    ];

    // Define relationship back to User (Many-to-One)
    public function user()
    {
        // UserProfile belongs to a User. UserProfile table has user_id FK.
        return $this->belongsTo(User::class); // Laravel infers FK name 'user_id'
    }
}
```
*ملاحظة:* إذا كانت علاقة UserProfile بـ User هي One-to-One *exactly* (كل مستخدم لديه ملف تعريف واحد فقط، وكل ملف تعريف ينتمي لمستخدم واحد فقط)، والطريقة التي تم بها بناء Migration هي `id()` كـ PK لـ `user_profiles` و `user_id` كـ FK (كما يفترض التغيير)، فإن تعريف العلاقات كـ `User->hasOne(UserProfile)` و `UserProfile->belongsTo(User)` هو الصحيح. التأكد من أن `user_id` في جدول `user_profiles` فريد (Unique index) يضمن أن العلاقة هي 1-to-1 من جانب `UserProfile` إلى `User`.

**`app/Models/UserPhoneNumber.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoneNumber extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'user_id',
        'phone_number',
        'is_primary',
        'description',
    ];

    public function user()
    {
        // UserPhoneNumber belongs to a User. UserPhoneNumbers table has user_id FK.
        return $this->belongsTo(User::class);
    }
}
```

**`app/Models/Product.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'seller_user_id',
        'name',
        'description',
        'color',
        'stock_quantity',
        'price',
        'main_image_url',
        'category_id',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
        'stock_quantity' => 'integer',
    ];

    public function seller()
    {
        // Product belongs to a User (seller). Products table has seller_user_id FK.
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    public function category()
    {
        // Product belongs to a ProductCategory. Products table has category_id FK.
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    // Polymorphic relationships where this Product is the target (One-to-Many polymorphic)
    // e.g., Product has many Ratings (where Rating's target_type is 'product' and target_id is this product's id)
    public function ratings()
    {
        // 'target' is the morph name defined in the Rating model's morphTo relation
        return $this->morphMany(Rating::class, 'target');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }

    // Product can appear in many cart items and order items (One-to-Many)
    public function shoppingCartItems()
    {
        return $this->hasMany(ShoppingCartItem::class);
    }

     public function orderItems()
    {
        return $this->hasMany(ProductOrderItem::class);
    }
}
```

**`app/Models/ProductCategory.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // Primary key is 'id' by default
    public $timestamps = false; // No timestamps in schema

    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];

    // Hierarchical relationship (Self-referencing)
    public function parent()
    {
        // ProductCategory belongs to a parent ProductCategory. ProductsCategory table has parent_category_id FK.
        // Specify FK and Local Key if they don't match conventions ('parent_category_id' vs 'id')
        return $this->belongsTo(ProductCategory::class, 'parent_category_id', 'id');
    }

    public function children()
    {
        // ProductCategory has many children ProductCategory. Children's parent_category_id points back here.
        return $this->hasMany(ProductCategory::class, 'parent_category_id', 'id');
    }

    // Relationship to products in this category
    public function products()
    {
        // ProductCategory has many Products. Products table has category_id FK.
        return $this->hasMany(Product::class, 'category_id');
    }
}
```

**`app/Models/ShoppingCartItem.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    // Primary key is 'id' by default
    // Assuming migration uses $table->id() for PK

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        // 'added_at' is usually handled by timestamps or default in DB
    ];

    protected $casts = [
        'added_at' => 'datetime',
        'quantity' => 'integer',
    ];

    public function user()
    {
        // ShoppingCartItem belongs to a User. ShoppingCartItems table has user_id FK.
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        // ShoppingCartItem belongs to a Product. ShoppingCartItems table has product_id FK.
        return $this->belongsTo(Product::class);
    }
}
```

**`app/Models/ProductOrder.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'user_id',
        'total_amount',
        'order_status',
        'shipping_address_line1',
        'shipping_address_line2',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
        'payment_transaction_id',
        // 'order_date' is often handled by timestamps or default in DB
    ];

    protected $casts = [
        'order_date' => 'datetime', // Or date if only date
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        // ProductOrder belongs to a User. ProductOrders table has user_id FK.
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        // ProductOrder has many ProductOrderItems. ProductOrderItems table has order_id FK.
        return $this->hasMany(ProductOrderItem::class);
    }
}
```

**`app/Models/ProductOrderItem.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrderItem extends Model
{
    use HasFactory;

    // Primary key is 'id' by default
    public $timestamps = false; // No timestamps in schema

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price_at_purchase',
    ];

     protected $casts = [
        'price_at_purchase' => 'decimal:2',
        'quantity' => 'integer',
    ];


    public function order()
    {
        // ProductOrderItem belongs to a ProductOrder. ProductOrderItems table has order_id FK.
        return $this->belongsTo(ProductOrder::class);
    }

    public function product()
    {
        // ProductOrderItem belongs to a Product. ProductOrderItems table has product_id FK.
        return $this->belongsTo(Product::class);
    }
}
```

**`app/Models/TouristSite.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSite extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'name',
        'description',
        'location_text',
        'latitude',
        'longitude',
        'city',
        'country',
        'category_id',
        'main_image_url',
        'video_url',
        'added_by_user_id',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8', // Or 11 depending on migration column definition
    ];


    public function category()
    {
        // TouristSite belongs to a SiteCategory. TouristSites table has category_id FK.
        return $this->belongsTo(SiteCategory::class, 'category_id');
    }

    public function addedBy()
    {
        // TouristSite belongs to a User (the one who added it). TouristSites table has added_by_user_id FK.
        return $this->belongsTo(User::class, 'added_by_user_id');
    }

    public function activities()
    {
        // TouristSite has many TouristActivities at this site. TouristActivities table has site_id FK.
        return $this->hasMany(TouristActivity::class);
    }

    public function experiences()
    {
        // TouristSite has many SiteExperiences. SiteExperiences table has site_id FK.
        return $this->hasMany(SiteExperience::class);
    }

    // Polymorphic relationships where this TouristSite is the target
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'target');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

     public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }
}
```

**`app/Models/SiteCategory.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteCategory extends Model
{
    use HasFactory;

    // Primary key is 'id' by default
    public $timestamps = false; // No timestamps in schema

    protected $fillable = [
        'name',
        'description',
    ];

    public function touristSites()
    {
        // SiteCategory has many TouristSites. TouristSites table has category_id FK.
        return $this->hasMany(TouristSite::class, 'category_id');
    }
}
```

**`app/Models/TouristActivity.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristActivity extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'name',
        'description',
        'site_id',
        'location_text',
        'start_datetime',
        'duration_minutes',
        'organizer_user_id',
        'price',
        'max_participants',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'duration_minutes' => 'integer',
        'price' => 'decimal:2',
        'max_participants' => 'integer',
    ];

    public function site()
    {
        // TouristActivity belongs to a TouristSite. TouristActivities table has site_id FK.
        return $this->belongsTo(TouristSite::class, 'site_id');
    }

    public function organizer()
    {
        // TouristActivity belongs to a User (organizer). TouristActivities table has organizer_user_id FK.
        return $this->belongsTo(User::class, 'organizer_user_id');
    }
}
```

**`app/Models/Hotel.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'name',
        'star_rating',
        'description',
        'address_line1',
        'city',
        'country',
        'latitude',
        'longitude',
        'contact_phone',
        'contact_email',
        'main_image_url',
        'managed_by_user_id',
    ];

    protected $casts = [
        'star_rating' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8', // Or 11
    ];

    public function managedBy()
    {
        // Hotel belongs to a User (manager). Hotels table has managed_by_user_id FK.
        return $this->belongsTo(User::class, 'managed_by_user_id');
    }

    public function rooms()
    {
        // Hotel has many HotelRooms. HotelRooms table has hotel_id FK.
        return $this->hasMany(HotelRoom::class);
    }

    // Polymorphic relationships where this Hotel is the target
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'target');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

     public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }
}
```

**`app/Models/HotelRoomType.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
    use HasFactory;

    // Primary key is 'id' by default
    public $timestamps = false; // No timestamps in schema

    protected $fillable = [
        'name',
        'description',
    ];

    public function rooms()
    {
        // HotelRoomType has many HotelRooms. HotelRooms table has room_type_id FK.
        return $this->hasMany(HotelRoom::class, 'room_type_id');
    }
}
```

**`app/Models/HotelRoom.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'room_number',
        'price_per_night',
        'area_sqm',
        'max_occupancy',
        'description',
        'is_available_for_booking',
    ];

     protected $casts = [
        'price_per_night' => 'decimal:2',
        'area_sqm' => 'decimal:2',
        'max_occupancy' => 'integer',
        'is_available_for_booking' => 'boolean',
    ];

    public function hotel()
    {
        // HotelRoom belongs to a Hotel. HotelRooms table has hotel_id FK.
        return $this->belongsTo(Hotel::class);
    }

    public function type()
    {
        // HotelRoom belongs to a HotelRoomType. HotelRooms table has room_type_id FK.
        return $this->belongsTo(HotelRoomType::class, 'room_type_id');
    }

    public function bookings()
    {
        // HotelRoom has many HotelBookings. HotelBookings table has room_id FK.
        return $this->hasMany(HotelBooking::class, 'room_id');
    }
}
```

**`app/Models/HotelBooking.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'num_adults',
        'num_children',
        'total_amount',
        'booking_status',
        'payment_status',
        'payment_transaction_id',
        'special_requests',
        // 'booked_at' is often handled by timestamps or default in DB
    ];

     protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'num_adults' => 'integer',
        'num_children' => 'integer',
        'total_amount' => 'decimal:2',
        'booked_at' => 'datetime',
    ];

    public function user()
    {
        // HotelBooking belongs to a User. HotelBookings table has user_id FK.
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        // HotelBooking belongs to a HotelRoom. HotelBookings table has room_id FK.
        return $this->belongsTo(HotelRoom::class, 'room_id');
    }
}
```

**`app/Models/SiteExperience.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteExperience extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'user_id',
        'site_id',
        'title',
        'content',
        'photo_url',
        'visit_date',
    ];

     protected $casts = [
        'visit_date' => 'date',
    ];

    public function user()
    {
        // SiteExperience belongs to a User. SiteExperiences table has user_id FK.
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        // SiteExperience belongs to a TouristSite. SiteExperiences table has site_id FK.
        return $this->belongsTo(TouristSite::class, 'site_id');
    }

    // Polymorphic relationships where this SiteExperience is the target
    // Note: Specify morph name if model name doesn't match snake_case singular of column (site_experience)
    // Eloquent should handle 'site_experience' automatically if target_type stores 'site_experience'
    public function ratings()
    {
         return $this->morphMany(Rating::class, 'target');
    }

    public function comments()
    {
         return $this->morphMany(Comment::class, 'target');
    }

     public function favorites()
    {
         return $this->morphMany(Favorite::class, 'target');
    }
}
```

**`app/Models/Article.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'author_user_id',
        'title',
        'content',
        'excerpt',
        'main_image_url',
        'video_url',
        'tags',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime', // Or date if only date
    ];


    public function author()
    {
        // Article belongs to a User (author). Articles table has author_user_id FK.
        return $this->belongsTo(User::class, 'author_user_id');
    }

    // Polymorphic relationships where this Article is the target
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'target');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

     public function favorites()
    {
        return $this->morphMany(Favorite::class, 'target');
    }
}
```

**`app/Models/Favorite.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    // Primary key is 'id' by default
    // If you used a composite PK in the migration, uncomment and adjust below:
    // protected $primaryKey = ['user_id', 'target_type', 'target_id']; // Example for composite
    // public $incrementing = false; // Composite PK is not auto-incrementing

    protected $fillable = [
        'user_id',
        'target_type',
        'target_id',
        // 'added_at' is usually handled by default in DB
    ];

     protected $casts = [
        'added_at' => 'datetime',
    ];


    public function user()
    {
        // Favorite belongs to a User. Favorites table has user_id FK.
        return $this->belongsTo(User::class);
    }

    // Polymorphic relationship to the favorited item (Site, Product, Article, Hotel)
    // Laravel expects target_type and target_id columns by default
    public function target()
    {
        return $this->morphTo(); // Searches for target_type and target_id columns
    }
}
```

**`app/Models/Rating.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'user_id',
        'target_type',
        'target_id',
        'rating_value',
        'review_title',
        'review_text',
    ];

    protected $casts = [
        'rating_value' => 'integer',
    ];

    public function user()
    {
        // Rating belongs to a User. Ratings table has user_id FK.
        return $this->belongsTo(User::class);
    }

    // Polymorphic relationship to the rated item
    public function target()
    {
        return $this->morphTo();
    }
}
```

**`app/Models/Comment.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Primary key is 'id' by default

    protected $fillable = [
        'user_id',
        'target_type',
        'target_id',
        'parent_comment_id',
        'content',
    ];

    public function user()
    {
        // Comment belongs to a User. Comments table has user_id FK.
        return $this->belongsTo(User::class);
    }

    // Polymorphic relationship to the commented item
    public function target()
    {
        return $this->morphTo();
    }

    // Relationship for nested comments (replies) - Self-referencing
    public function parent()
    {
        // Comment belongs to a parent Comment. Comments table has parent_comment_id FK.
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function replies()
    {
        // Comment has many child Comments (replies). Children's parent_comment_id points back here.
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
}
```

**ملخص التغييرات في النماذج:**

*   تمت إزالة `$primaryKey` (إذا كانت محددة بأسماء غير `id`)، `$incrementing`، و `$keyType` من جميع النماذج حيث أن `id` هو المفتاح الأساسي الافتراضي.
*   تمت إضافة `$fillable` لكل نموذج مع تضمين جميع الأعمدة التي يمكن تعيين قيم لها بشكل جماعي (Mass Assignment)، بما في ذلك أعمدة المفاتيح الأجنبية.
*   تم التأكد من صحة تعريف علاقات Eloquent (`belongsTo`, `hasMany`, `hasOne`) مع تحديد اسم العمود الأجنبي بشكل صريح فقط إذا كان يختلف عن التسمية الافتراضية لـ Laravel (مثلاً، `seller_user_id` بدلاً من `user_id`).
*   تم التأكد من صحة تعريف العلاقات المتعددة الأشكال (`morphTo`, `morphMany`) باستخدام الاسم الافتراضي `'target'` لـ morph (والذي يبحث عن عمودي `target_type` و `target_id`).
*   تم إضافة `$casts` لبعض الأعمدة لضمان التعامل مع البيانات بالنوع الصحيح (مثل التواريخ والأرقام العشرية والقيم المنطقية).
*   تم تحديد `$timestamps = false;` للنماذج التي لا تحتوي على عمودي `created_at` و `updated_at` في مخطط القاعدة (ProductCategories, HotelRoomTypes, ProductOrderItems).

الآن، هذه النماذج تتوافق مع بنية قاعدة البيانات التي تستخدم `id` كمفتاح أساسي في جميع الجداول و `foreignId()` لتعريف المفاتيح الأجنبية.

---

تمام، لإنشاء واجهة تسجيل الدخول الويب باستخدام Laravel Breeze، ستحتاج إلى تنفيذ خطوتين رئيسيتين: تثبيت الحزمة ثم تشغيل أمر Artisan الخاص بها لنشر الملفات.

Laravel Breeze خيار ممتاز لتوفير واجهات مصادقة سريعة وسهلة الإعداد، بما في ذلك تسجيل الدخول، التسجيل، إعادة تعيين كلمة المرور، وتأكيد البريد الإلكتروني.

**الخطوات لإنشاء واجهة تسجيل الدخول (Web) باستخدام Laravel Breeze:**

**الخطوة 1: تثبيت حزمة Laravel Breeze عبر Composer**

افتح سطر الأوامر في جذر مشروع Laravel ونفذ الأمر التالي:

```bash
composer require laravel/breeze --dev
```

الأمر `--dev` يعني أن هذه الحزمة مطلوبة فقط في بيئة التطوير، وليست ضرورية لعمل التطبيق في بيئة الإنتاج بعد بناء الأصول الأمامية.

**الخطوة 2: تشغيل أمر Artisan لنشر ملفات Breeze**

بعد تثبيت الحزمة، يجب عليك تشغيل أمر `breeze:install`. هذا الأمر سينشر متحكمات، مسارات (Routes)، صفحات عرض (Views)، وملفات CSS/JavaScript أساسية لإعداد نظام المصادقة.

نفذ الأمر التالي:

```bash
php artisan breeze:install
```

عند تشغيل هذا الأمر، سيتم سؤالك عن Stack الأمامي الذي تريد استخدامه. لإنشاء واجهة ويب تقليدية (مثل واجهة تسجيل الدخول للوحة تحكم إدارية بسيطة)، اختر **Blade**:

```
Which stack would you like to install? (blade, livewire, react, vue, api) [none]
 ❯ blade 
```

*ملاحظة:* إذا اخترت `api` هنا، فسيقوم Breeze بإعداد مصادقة API باستخدام Sanctum، وهذا ما قمت بإعداده بالفعل يدوياً. لذا، تأكد من اختيار **Blade** لواجهة الويب.

قد يسألك أيضاً عن تفعيل وضع Dark Mode أو استخدام PHPUnit/Pest للاختبارات. يمكنك اختيار الخيارات التي تناسب مشروعك.

بعد اختيار Stack، سيقوم Laravel Breeze بنشر الملفات اللازمة.

**الخطوة 3: بناء الأصول الأمامية (Frontend Assets)**

Breeze يستخدم Tailwind CSS و JavaScript. تحتاج إلى تثبيت الاعتماديات الأمامية وبنائها.

```bash
npm install
npm run dev
```

أو إذا كنت تستخدم `yarn`:

```bash
yarn install
yarn dev
```

أمر `npm run dev` (أو `yarn dev`) سيقوم ببناء ملفات CSS و JavaScript ونقلها إلى المجلدات العامة (public) لكي يتمكن المتصفح من الوصول إليها.

**ماذا تفعل هذه الأوامر؟**

*   تنشئ متحكمات (Controllers) في `app/Http/Controllers/Auth/` للتعامل مع عمليات تسجيل الدخول، التسجيل، إلخ.
*   تنشئ مسارات (Routes) في ملف جديد اسمه `routes/auth.php` (يتم تضمينه تلقائياً في `web.php`).
*   تنشئ صفحات عرض (Views) في `resources/views/auth/` (مثل `login.blade.php`, `register.blade.php`, إلخ).
*   تعدل ملف `tailwind.config.js` وتضيف ملفات CSS أساسية في `resources/css/`.
*   تعدل ملف `app/Providers/RouteServiceProvider.php` لتحديد مسار إعادة التوجيه بعد تسجيل الدخول (ثابت `HOME`).

**بعد هذه الخطوات:**

*   ستكون لديك الآن صفحات تسجيل الدخول (`/login`)، التسجيل (`/register`)، وغيرها تعمل بشكل افتراضي.
*   يمكنك الوصول إلى هذه الصفحات عبر متصفح الويب.
*   إذا قمت بتشغيل الـ Migrations (`php artisan migrate`) بعد تثبيت Breeze (يفضل دائماً تشغيل Migrations بعد تثبيت أي حزمة قد تعدل قاعدة البيانات)، فسيتم إضافة عمود `email_verified_at` إلى جدول `users` (إذا لم تكن قد أضفته يدوياً بالفعل عند تعديل الـ Migration).
*   يمكنك الآن استخدام الـ Views التي أنشأها Breeze (موجودة في `resources/views/auth`) كنقطة بداية لتصميم واجهة تسجيل الدخول للوحة التحكم الإدارية، أو استخدامها كما هي.

تذكر أن هذه الواجهة ستستخدم نفس جدول `users` افتراضياً. للتحكم في من يمكنه الوصول إلى لوحة التحكم الإدارية بعد تسجيل الدخول، ستحتاج إلى تطبيق Middleware أو Gates/Policies بناءً على `user_type` (كما أشرنا سابقاً في تصميم `web.php`).



---

تمام، فهمت المشكلة الآن. بما أنك حاولت إنشاء ملف `api.php` يدوياً ولم يعمل، فهذا يؤكد أن المشكلة كانت في تهيئة `RouteServiceProvider` لتحميل هذا الملف وتطبيق الـ `api` middleware group عليه.

أفضل خيار لك الآن هو أن تجعل **Laravel Breeze يقوم بتهيئة مسارات الـ API لك بشكل صحيح** عن طريق اختيار Stack المناسب عند تشغيل `breeze:install`.

**الخيار الأفضل لمشروعك هو اختيار Stack الـ `api` عند تنصيب Breeze:**

```bash
php artisan breeze:install api
```

**لماذا تختار `api`؟**

1.  **إعداد Sanctum API Authentication:** هذا الـ Stack مصمم خصيصاً لإعداد مسارات ومتحكمات المصادقة اللازمة لتطبيق API يستخدم Laravel Sanctum. سيقوم بإنشاء مسارات تسجيل الدخول، التسجيل، تسجيل الخروج، واسترجاع معلومات المستخدم المصادق عليه (تحت بادئة `/api/`) والتي تعمل مع الـ Tokens.
2.  **تهيئة `RouteServiceProvider`:** عند اختيار `api` stack، سيقوم Breeze تلقائياً بتعديل ملف `app/Providers/RouteServiceProvider.php` لضمان تحميل ملف `routes/api.php` وتطبيق الـ `api` middleware group عليه. هذا سيحل مشكلة عدم عمل ملف `api.php` التي واجهتها سابقاً.
3.  **يناسب تطبيق الموبايل:** مسارات المصادقة التي ينشئها هذا الـ Stack مناسبة تماماً لتطبيق جوال Flutter/React Native يعتمد على الـ Tokens للمصادقة.

**ماذا سيحدث عند تشغيل `php artisan breeze:install api`؟**

*   سيقوم بإنشاء ملف `routes/api.php` (إذا لم يكن موجوداً) أو تعديله.
*   سيضيف مسارات المصادقة لـ Breeze (مثل `/api/login`, `/api/register`, `/api/logout`, `/api/user`) إلى هذا الملف.
*   سيعدل `app/Providers/RouteServiceProvider.php` لضمان تحميل `routes/api.php` تحت بادئة `/api/` وتطبيق الـ `api` middleware.
*   سيقوم بنشر متحكم مصادقة مخصص لـ API (عادةً في `app/Http/Controllers/Auth/AuthenticatedSessionController.php` أو ما شابه، يتعامل مع الـ JSON).
*   لن ينشئ أي ملفات View (.blade.php) أو أصول أمامية (CSS/JS) لواجهة تسجيل دخول الويب، لأن هذا الـ Stack يركز فقط على API.

**ماذا عن واجهة تسجيل دخول لوحة التحكم الإدارية (الويب)؟**

بعد تشغيل `php artisan breeze:install api`، ستكون قد أعددت مسارات ومتحكمات المصادقة الخاصة بالـ API. لكنك لا تزال بحاجة إلى واجهة تسجيل دخول تعتمد على الويب (Blade Views) للوحة التحكم الإدارية. لديك خياران:

1.  **بناء واجهة الويب يدوياً:** بما أنك بالفعل قمت بإنشاء ملفات الـ Views مثل `resources/views/auth/login.blade.php`، يمكنك بناء واجهة تسجيل الدخول بنفسك باستخدام هذه الـ Views ومتحكمات الويب القياسية في Laravel (`app/Http/Controllers/Auth/`).
2.  **تشغيل `breeze:install` مرة أخرى لاحقاً لاختيار Stack الـ `blade`:** يمكن تشغيل `php artisan breeze:install` أكثر من مرة. إذا قمت بتشغيله مرة أخرى واخترت `blade` Stack، سيقوم بإنشاء ملفات الـ Views ومتحكمات الويب والـ Routes الخاصة بـ Breeze للويب (عادةً في `routes/auth.php`). يمكن أن يكون هذا أسرع إذا أردت استخدام تصميم Breeze الافتراضي لصفحات الويب. ستحتاج بعد ذلك إلى دمج أو فصل منطق مصادقة الويب عن منطق مصادقة الـ API إذا كنت تريد استخدام نفس جدول `users` ولكن بمسارات مصادقة مختلفة.

**التوصية النهائية:**

ابدأ بتشغيل:

```bash
php artisan breeze:install api
```

هذا سيضمن إعداد مسارات ومتحكمات مصادقة الـ API بشكل صحيح، والتي هي أساس مشروع تطبيق الموبايل الخاص بك. كما سيحل مشكلة تهيئة ملف `api.php`.

بعد هذه الخطوة، قم بتعديل محتوى ملف `routes/api.php` الناتج عن Breeze لإضافة مسارات الـ API الأخرى لمواردك (المنتجات، المواقع، إلخ) ضمن الـ `auth:sanctum` middleware group للمسارات المحمية، وخارجها للمسارات العامة، كما خططنا سابقاً.

بالنسبة لواجهة تسجيل دخول الويب الإدارية، قرر لاحقاً ما إذا كنت ستنشئها يدوياً أو ستشغل `breeze:install blade` لإنجاز الجزء الأمامي بسرعة.

---


