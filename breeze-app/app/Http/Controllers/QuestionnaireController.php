<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view('questionnaire.index');
    }

    public function store(Request $request)
    {
        // Formdan gelen veriyi doğrulama
        $data = $request->validate([
            'department' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
        ]);

        // Kullanıcıyı alın (eğer giriş yapılmışsa)
        $user = Auth::user();

        if ($user) {
            // Kullanıcı giriş yapmışsa, bilgilerini güncelle
            $user->update([
                'department' => $data['department'],
                'degree' => $data['degree'],
            ]);
        } else {
            // Kullanıcı giriş yapmamışsa, yeni bir kullanıcı oluşturabilirsiniz
            $user = new User([
                'username' => 'user_' . uniqid(), // Örnek olarak benzersiz bir kullanıcı adı oluşturabilirsiniz
                'email' => $request->email, // Formdan e-posta alınabilir
                'password' => bcrypt('your_default_password'), // Varsayılan bir şifre belirleyin
                'department' => $data['department'],
                'degree' => $data['degree'],
            ]);
            $user->save();
        }

        // Başarı mesajı ile geri yönlendirme
        return redirect()->route('dashboard')->with('success', 'Form başarıyla gönderildi!');
    }
}
