import { motion } from 'framer-motion';
import { ShoppingCart, Leaf, Shield, Globe, Menu, X } from 'lucide-react';
import { useState } from 'react';

// Components
import Hero from './components/Hero';
import TheProblem from './components/TheProblem';
import TargetMarket from './components/TargetMarket';
import Traction from './components/Traction';
import StrategicGoals from './components/StrategicGoals';
import Defensibility from './components/Defensibility';
import QualityAssurance from './components/QualityAssurance';
import Sustainability from './components/Sustainability';
import WhyChooseUs from './components/WhyChooseUs';
import Shop from './components/Shop';
import Team from './components/Team';
import Contact from './components/Contact';
import Footer from './components/Footer';

export default function App() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [cartCount, setCartCount] = useState(0);

  const navItems = [
    { label: 'Home', href: '#home' },
    { label: 'About', href: '#quality' },
    { label: 'Products', href: '#shop' },
    { label: 'Team', href: '#team' },
    { label: 'Contact', href: '#contact' },
  ];

  return (
    <div className="min-h-screen font-sans bg-bg-body text-text-main selection:bg-primary-light selection:text-primary-dark">
      {/* Navigation */}
      <nav className="fixed w-full z-50 top-0 left-0 bg-white/70 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-20">
            {/* Logo */}
            <div className="flex-shrink-0 flex items-center gap-3">
              <img src="/Images/logo.png" alt="EcoNeemTech Logo" className="h-10 w-auto" />
              <span className="text-2xl font-serif font-bold text-primary-dark">EcoNeemTech</span>
            </div>

            {/* Desktop Nav */}
            <div className="hidden md:flex items-center space-x-8">
              {navItems.map((item) => (
                <a
                  key={item.label}
                  href={item.href}
                  className="text-text-muted hover:text-primary font-medium transition-colors"
                >
                  {item.label}
                </a>
              ))}
              <div className="relative group">
                <button className="flex items-center justify-center p-2 rounded-full bg-bg-soft text-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                  <ShoppingCart size={20} />
                  {cartCount > 0 && (
                    <span className="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-accent text-[10px] font-bold text-primary-dark border-2 border-white">
                      {cartCount}
                    </span>
                  )}
                </button>
              </div>
            </div>

            {/* Mobile menu button */}
            <div className="md:hidden flex items-center gap-4">
              <button className="relative">
                <ShoppingCart className="text-text-muted" size={24} />
                {cartCount > 0 && (
                  <span className="absolute -top-1 -right-2 flex h-5 w-5 items-center justify-center rounded-full bg-accent text-[10px] font-bold text-primary-dark border-2 border-white">
                    {cartCount}
                  </span>
                )}
              </button>
              <button
                onClick={() => setIsMenuOpen(!isMenuOpen)}
                className="text-text-muted hover:text-primary focus:outline-none"
              >
                {isMenuOpen ? <X size={28} /> : <Menu size={28} />}
              </button>
            </div>
          </div>
        </div>

        {/* Mobile Nav */}
        {isMenuOpen && (
          <motion.div 
            initial={{ opacity: 0, y: -10 }}
            animate={{ opacity: 1, y: 0 }}
            className="md:hidden bg-white border-b border-gray-100"
          >
            <div className="px-4 pt-2 pb-6 space-y-1">
              {navItems.map((item) => (
                <a
                  key={item.label}
                  href={item.href}
                  onClick={() => setIsMenuOpen(false)}
                  className="block px-3 py-3 rounded-md text-base font-medium text-text-main hover:text-primary hover:bg-bg-soft"
                >
                  {item.label}
                </a>
              ))}
            </div>
          </motion.div>
        )}
      </nav>

      {/* Main Content */}
      <main className="pt-20">
        <Hero />
        <TheProblem />
        <TargetMarket />
        <Traction />
        <StrategicGoals />
        <Defensibility />
        <QualityAssurance />
        <Sustainability />
        <WhyChooseUs />
        <Shop cartCount={cartCount} setCartCount={setCartCount} />
        <Team />
        <Contact />
      </main>
      
      <Footer />
    </div>
  );
}
