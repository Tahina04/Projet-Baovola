export default function HomePage() {
  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-100">
      <div className="text-center">
        <h1 className="text-4xl font-bold mb-4">Bienvenue sur Baovola</h1>
        <div className="space-x-4">
          <a href="/login" className="inline-block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
            Se connecter
          </a>
          <a href="/register" className="inline-block bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700">
            S'inscrire
          </a>
        </div>
      </div>
    </div>
  );
}