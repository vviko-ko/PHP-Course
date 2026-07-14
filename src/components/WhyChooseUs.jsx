import { motion } from 'framer-motion';
import { Check } from 'lucide-react';

export default function WhyChooseUs() {
  const reasons = [
    "Naturally derived formulations backed by traditional knowledge and modern science",
    "Legally registered Nigerian entity, fully compliant with CAMA 2020",
    "A broad, complementary product range across personal, home & environmental care",
    "A founding team of eight committed shareholders with shared long-term vision",
    "Genuine, embedded sustainability – not a marketing afterthought",
    "Positioned at the intersection of health, environment, and accessible innovation"
  ];

  return (
    <section id="why-us" className="py-16 md:py-24 lg:py-32 bg-bg-body border-b border-primary-light/20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col lg:flex-row gap-10 md:gap-16 items-center">
          <div className="lg:w-1/2">
            <motion.div 
              initial={{ opacity: 0, x: -30 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
            >
              <span className="text-primary font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Why Choose Us</span>
              <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif text-primary-dark mb-4 md:mb-8 leading-tight">Six Reasons to Partner With EcoNeemTech</h2>
              <p className="text-text-muted font-light text-base md:text-lg mb-6 md:mb-10 leading-relaxed">
                We are dedicated to building a sustainable future by offering natural, effective, and environmentally conscious solutions. Here is what sets us apart.
              </p>
              <div className="w-24 h-px bg-primary hidden md:block"></div>
            </motion.div>
          </div>
          
          <div className="lg:w-1/2 w-full mt-6 md:mt-0">
            <div className="grid gap-4 md:gap-6">
              {reasons.map((reason, index) => (
                <motion.div
                  key={index}
                  initial={{ opacity: 0, x: 30 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.1 }}
                  className="flex items-start gap-4 md:gap-6 p-5 md:p-6 bg-white border border-primary-light/30 hover:border-primary-dark/20 transition-colors group"
                >
                  <div className="flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-full bg-bg-soft text-primary flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors duration-500">
                    <Check size={18} strokeWidth={2} className="w-4 h-4 md:w-auto md:h-auto" />
                  </div>
                  <p className="text-sm md:text-base text-text-main font-light leading-relaxed mt-1">{reason}</p>
                </motion.div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
