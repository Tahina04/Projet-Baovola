import './globals.css';
import { AuthProvider } from '@/hooks/useAuth';

export const metadata = {
  title: 'Baovola',
  description: 'Application Baovola',
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="fr">
      <body>
        <AuthProvider>{children}</AuthProvider>
      </body>
    </html>
  );
}