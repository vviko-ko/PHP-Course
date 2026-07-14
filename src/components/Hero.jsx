import { motion } from 'framer-motion';
import { ArrowRight } from 'lucide-react';

export default function Hero() {
  return (
    <section id="home" className="relative min-h-[90vh] flex items-center bg-bg-body overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex flex-col lg:flex-row items-center gap-10 lg:gap-16 py-16 md:py-24 lg:py-0 mt-16 md:mt-0">
        
        {/* Left Content */}
        <div className="lg:w-1/2 w-full z-10">
          <motion.div
            initial={{ opacity: 0, y: 40 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
          >
            <span className="text-primary font-bold tracking-widest uppercase text-xs md:text-sm mb-4 md:mb-6 block border-b border-primary/20 pb-4 inline-block">
              EcoNeemTech Portfolio
            </span>
            <h1 className="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-serif text-primary-dark leading-[1.1] mb-6 md:mb-8">
              Nature's Wisdom. <br />
              <span className="italic font-light text-primary">Modern Living.</span>
            </h1>
            <p className="max-w-xl text-base sm:text-lg md:text-xl text-text-muted mb-8 md:mb-12 font-light leading-relaxed">
              We provide sustainable, Neem-based natural products for personal, home, and environmental care. Empowering communities through eco-friendly innovation.
            </p>

            <div className="flex flex-col sm:flex-row gap-4 sm:gap-6">
              <a
                href="#shop"
                className="group inline-flex items-center justify-center gap-3 px-6 md:px-8 py-3 md:py-4 bg-primary-dark text-white rounded-none border border-primary-dark hover:bg-transparent hover:text-primary-dark transition-all duration-500 ease-[0.16,1,0.3,1]"
              >
                <span className="tracking-wide uppercase text-xs md:text-sm font-semibold">Explore Products</span>
                <ArrowRight size={18} className="group-hover:translate-x-1 transition-transform" />
              </a>
              <a
                href="#why-us"
                className="inline-flex items-center justify-center px-6 md:px-8 py-3 md:py-4 bg-transparent text-text-main rounded-none border border-primary-light hover:border-primary-dark transition-all duration-500"
              >
                <span className="tracking-wide uppercase text-xs md:text-sm font-semibold">Why Choose Us</span>
              </a>
            </div>
          </motion.div>
        </div>

        {/* Right Image */}
        <div className="lg:w-1/2 w-full h-[400px] sm:h-[500px] lg:h-[600px] relative mt-10 lg:mt-0 block">
          <motion.div
            initial={{ opacity: 0, scale: 0.95 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 1, ease: [0.16, 1, 0.3, 1], delay: 0.2 }}
            className="w-full h-full relative"
          >
            <div className="absolute inset-0 bg-primary-dark/5 z-10 mix-blend-multiply"></div>
            <img 
              src="/Images/hero_image.png" 
              alt="EcoNeemTech Products" 
              className="w-full h-full object-cover rounded-sm shadow-2xl filter brightness-95"
            />
          </motion.div>
          {/* Decorative minimalist square */}
          <motion.div
            initial={{ opacity: 0, x: 40 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 1, ease: [0.16, 1, 0.3, 1], delay: 0.4 }}
            className="absolute -bottom-4 -left-4 md:-bottom-8 md:-left-8 w-24 h-24 md:w-48 md:h-48 border-l border-b border-primary/30 -z-10"
          ></motion.div>
        </div>

      </div>
    </section>
  );
}
