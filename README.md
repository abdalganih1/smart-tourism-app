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



